<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class DataController extends Controller
{
    public function search(Request $request)
    {
        $query = DataModel::query();

        // Пример фильтрации по полям
        if ($request->has('field1')) {
            $query->where('field1', 'like', '%' . $request->input('field1') . '%');
        }

        if ($request->has('field2')) {
            $query->where('field2', $request->input('field2'));
        }

        // Добавьте другие фильтры по мере необходимости

        $results = $query->paginate(10);

        return view('search_results', compact('results'));
    }
}

