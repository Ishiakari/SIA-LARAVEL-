<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController; 
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanTransactionController;

Route::get('/', function () {
    return view('welcome');
});

// 1. The Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- ACTIVITY 13: RELATIONAL MODULES START ---

Route::middleware(['auth', 'verified'])->group(function () {
    
    // CUSTOMERS (Master Table 1)
    Route::get('/customers/export', [CustomersController::class, 'exportPdf'])->name('customers.export');
    Route::resource('customers', CustomersController::class);

    // LOANS (Master Table 2)
    Route::resource('loans', LoanController::class);

    // LOAN TRANSACTIONS (Transaction Table)
    // The PDF route must come BEFORE the resource route to avoid ID conflicts
    Route::get('/loantransactions/pdf', [LoanTransactionController::class, 'generatePDF'])->name('transactions.pdf');
    Route::resource('loantransactions', LoanTransactionController::class);

});

// --- ACTIVITY 13: RELATIONAL MODULES END ---

// 3. Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';