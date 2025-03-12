<?php

namespace App\Exports;

use App\Models\Contract;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ContractsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Получаем все договоры с отношениями
        return Contract::with('supplier')->get();
    }

    public function headings(): array
    {
        return [
            'Поставщик',
            'Сумма',
            'Количество',
            'Дата поставки',
            'Статус',
        ];
    }

    public function map($contract): array
    {
        return [
            $contract->supplier->name, // Имя поставщика
            $contract->amount,
            $contract->quantity,
            $contract->delivery_date,
            $contract->status,
        ];
    }
}
