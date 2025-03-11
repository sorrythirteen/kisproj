<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Supplier;
use App\Exports\ContractsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

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
        return view('contracts.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'delivery_date' => 'required',
        ]);

        Contract::create($request->except('_token'));
        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }

    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $suppliers = Supplier::all();
        return view('contracts.edit', compact('contract', 'suppliers'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'supplier_id' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'delivery_date' => 'required',
        ]);

        $contract->update($request->except('_token'));
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
