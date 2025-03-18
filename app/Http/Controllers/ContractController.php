<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Supplier;
use App\Exports\ContractsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Material;

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
}
