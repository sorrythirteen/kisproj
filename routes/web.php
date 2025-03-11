<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AccountingEntryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('suppliers', SupplierController::class);
Route::resource('contracts', ContractController::class);
Route::resource('materials', MaterialController::class);
Route::resource('accounting_entries', AccountingEntryController::class);
Route::resource('contracts', ContractController::class);
Route::get('export-contracts', [ContractController::class, 'exportContracts'])->name('contracts.export');
