<?php

namespace App\Exports;

use App\Models\Contract;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContractsExport implements FromCollection, WithHeadingRow
{
    public function collection()
    {
        return Contract::all();
    }

    public function headings(): array
    {
        return [
            'Supplier',
            'Amount',
            'Quantity',
            'Delivery Date',
            'Status',
        ];
    }
}
