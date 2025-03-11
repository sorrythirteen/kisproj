<?php

namespace App\Http\Controllers;

use App\Models\AccountingEntry; // Импортируем модель AccountingEntry
use App\Models\Contract; // Импортируем модель Contract
use Illuminate\Http\Request;

class AccountingEntryController extends Controller
{
    public function index()
    {
        $accountingEntries = AccountingEntry::all();
        return view('accounting_entries.index', compact('accountingEntries'));
    }

    public function create()
    {
        $contracts = Contract::all();
        return view('accounting_entries.create', compact('contracts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_id' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
        ]);

        AccountingEntry::create($request->all());
        return redirect()->route('accounting_entries.index')->with('success', 'Accounting entry created successfully.');
    }

    public function show(AccountingEntry $accountingEntry)
    {
        return view('accounting_entries.show', compact('accountingEntry'));
    }

    public function edit(AccountingEntry $accountingEntry)
    {
        $contracts = Contract::all();
        return view('accounting_entries.edit', compact('accountingEntry', 'contracts'));
    }

    public function update(Request $request, AccountingEntry $accountingEntry)
    {
        $request->validate([
            'contract_id' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
        ]);

        $accountingEntry->update($request->all());
        return redirect()->route('accounting_entries.index')->with('success', 'Accounting entry updated successfully.');
    }

    public function destroy(AccountingEntry $accountingEntry)
    {
        $accountingEntry->delete();
        return redirect()->route('accounting_entries.index')->with('success', 'Accounting entry deleted successfully.');
    }
}
