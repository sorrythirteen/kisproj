<?php
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AccountingEntryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

// Login and Registration Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Guest Middleware to redirect to login
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// Dashboard and other authenticated routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource('suppliers', SupplierController::class);
Route::resource('contracts', ContractController::class);
Route::resource('materials', MaterialController::class);
Route::resource('accounting_entries', AccountingEntryController::class);
Route::get('export-contracts', [ContractController::class, 'exportContracts'])->name('contracts.export');
Route::get('/search', [DataController::class, 'search'])->name('data.search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/examplebtn', [DemoController::class, 'index'])->name('examplebtn.index');
