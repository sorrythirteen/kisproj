<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Material;
use App\Models\AccountingEntry;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMaterials = Material::count();
        $totalCost = Material::sum('price');
        $totalAccountingEntries = AccountingEntry::count();
        $totalSuppliers = Supplier::count();
        $totalContracts = Contract::count();
        $totalMaterialsValue = Material::sum('price');
    
        // Получаем данные для графика
        $materialNames = [];
        $materialQuantities = [];
    
        $materials = Material::all();
        foreach ($materials as $material) {
            $materialNames[] = $material->name;
            $materialQuantities[] = $material->quantity;
        }
    
        return view('dashboard.index', compact(
            'totalMaterials',
            'totalCost',
            'totalAccountingEntries',
            'totalSuppliers',
            'totalContracts',
            'totalMaterialsValue',
            'materialNames',
            'materialQuantities'
        ));
    }
}
