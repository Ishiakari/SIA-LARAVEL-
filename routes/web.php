<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController; 

Route::get('/', function () {
    return view('welcome');
});

// 1. The Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- CUSTOMER SECTION START ---

// Place the Export route BEFORE the Resource route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/customers/export', [CustomersController::class, 'exportPdf'])->name('customers.export');
    Route::resource('customers', CustomersController::class);
});

// --- CUSTOMER SECTION END ---

// 3. Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';