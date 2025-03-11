<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Material;
use App\Models\AccountingEntry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMaterials = Material::sum('quantity');
        $totalCost = Contract::sum('amount');
        $totalAccountingEntries = AccountingEntry::count();
        $totalSuppliers = \App\Models\Supplier::count();
        $totalContracts = Contract::count();
        $totalMaterialsValue = Material::sum('price');

        return view('dashboard.index', compact('totalMaterials', 'totalCost', 'totalAccountingEntries', 'totalSuppliers', 'totalContracts', 'totalMaterialsValue'));
    }
}
