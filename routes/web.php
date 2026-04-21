<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController; 
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanTransactionController;

Route::get('/', function () {
    return view('welcome');
});

// Accessible by everyone authenticated
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ADMIN ONLY: Transactions and PDF Exports
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/loantransactions/pdf', [LoanTransactionController::class, 'generatePDF'])->name('transactions.pdf');
        Route::resource('loantransactions', LoanTransactionController::class);
        Route::get('/customers/export', [CustomersController::class, 'exportPdf'])->name('customers.export');
    });

    // ADMIN & STAFF: Manage Customers and Loans
    Route::middleware(['role:admin,staff'])->group(function () {
        Route::resource('customers', CustomersController::class);
        Route::resource('loans', LoanController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';