<?php
use App\Exports\ContractsExport;
use Maatwebsite\Excel\Facades\Excel;

function exportContracts()
{
    return Excel::download(new ContractsExport, 'contracts.xlsx');
}
