<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Supplier;
use App\Exports\ContractsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Material;
use PhpOffice\PhpWord\TemplateProcessor;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
{
    $suppliers = Supplier::all();
    $materials = Material::where('quantity', '>', 0)->get();
    return view('contracts.create', compact('suppliers', 'materials'));
}


public function store(Request $request)
{
    $request->validate([
        'supplier_id' => 'required',
        'materials' => 'required|array',
        'materials.*.id' => 'required|exists:materials,id',
        'materials.*.quantity' => 'required|integer|min:1',
        'delivery_date' => 'required',
    ]);

    $totalAmount = 0;
    foreach ($request->materials as $materialData) {
        $material = Material::find($materialData['id']);
        $totalAmount += $material->price * $materialData['quantity'];
    }

    $contract = Contract::create([
        'supplier_id' => $request->supplier_id,
        'amount' => $totalAmount,
        'delivery_date' => $request->delivery_date,
    ]);

    foreach ($request->materials as $materialData) {
        $contract->materials()->attach($materialData['id'], ['quantity' => $materialData['quantity']]);
    }

    return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
}



    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
{
    $suppliers = Supplier::all();
    $materials = Material::where('quantity', '>', 0)->get();
    return view('contracts.edit', compact('contract', 'suppliers', 'materials'));
}


public function update(Request $request, Contract $contract)
{
    $request->validate([
        'supplier_id' => 'required',
        'materials' => 'required|array',
        'materials.*.id' => 'required|exists:materials,id',
        'materials.*.quantity' => 'required|integer|min:1',
        'delivery_date' => 'required',
        'status' => 'required|in:in_progress,completed',
    ]);

    $totalAmount = 0;
    foreach ($request->materials as $materialData) {
        $material = Material::find($materialData['id']);
        $totalAmount += $material->price * $materialData['quantity'];
    }

    $contract->update([
        'supplier_id' => $request->supplier_id,
        'amount' => $totalAmount,
        'delivery_date' => $request->delivery_date,
        'status' => $request->status,
    ]);

    $contract->materials()->detach();
    foreach ($request->materials as $materialData) {
        $contract->materials()->attach($materialData['id'], ['quantity' => $materialData['quantity']]);
    }

    return redirect()->route('contracts.index')->with('success', 'Contract updated successfully.');
}



    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully.');
    }

    public function exportContracts()
    {
        return Excel::download(new ContractsExport, 'contracts.xlsx');
    }

    

    public function exportWord($id)
    {
        // Найти договор по ID
        $contract = Contract::with('supplier', 'materials')->findOrFail($id);
    
        // Загрузка шаблона Word
        $templateProcessor = new TemplateProcessor(storage_path('app/public/contract_template.docx'));
    
        // Заполнение шаблона данными
        $templateProcessor->setValue('contract_number', $contract->id);
        $templateProcessor->setValue('city', 'Москва'); // Пример города
        $templateProcessor->setValue('contract_date', now()->format('d.m.Y'));
        $templateProcessor->setValue('supplier_name', $contract->supplier->name);
        $templateProcessor->setValue('amount', $contract->amount);
        // $templateProcessor->setValue('payment_date', $contract->delivery_date->copy()->addDays(10)->format('d.m.Y')); // Пример срока оплаты
        // $templateProcessor->setValue('delivery_date', $contract->delivery_date->format('d.m.Y'));
        $templateProcessor->setValue('status', $contract->status);
    
        // Дополнительные данные поставщика
        $templateProcessor->setValue('supplier_inn', $contract->supplier->inn);
        $templateProcessor->setValue('supplier_bank', $contract->supplier->bank);
        $templateProcessor->setValue('supplier_bik', $contract->supplier->bik);
        $templateProcessor->setValue('supplier_account', $contract->supplier->account);
        $templateProcessor->setValue('supplier_director_name', $contract->supplier->director_name);
    
        // Пример данных покупателя (замените на реальные данные)
        // $templateProcessor->setValue('buyer_name', 'ООО "Ромашка"');
        // $templateProcessor->setValue('buyer_inn', '1234567890');
        // $templateProcessor->setValue('buyer_bank', 'ПАО "Банк"');
        // $templateProcessor->setValue('buyer_bik', '044525999');
        // $templateProcessor->setValue('buyer_account', '40702810123456789012');
        // $templateProcessor->setValue('buyer_director_name', 'Иванов Иван Иванович');
    
        // Формирование таблицы материалов
        $materialsTable = "<table border='1'><tr><th>Название</th><th>Количество</th><th>Цена за единицу</th></tr>";
        foreach ($contract->materials as $material) {
            $materialsTable .= "<tr><td>{$material->name}</td><td>{$material->pivot->quantity}</td><td>{$material->price}</td></tr>";
        }
        $materialsTable .= "</table>";
    
        $templateProcessor->setValue('materials_table', $materialsTable);
    
        // Сохранение документа
        $filename = 'contract_' . time() . '.docx';
        $templateProcessor->saveAs(storage_path('app/public/' . $filename));
    
        // Возврат документа для скачивания
        return response()->download(storage_path('app/public/' . $filename))->deleteFileAfterSend(true);
    }

}
