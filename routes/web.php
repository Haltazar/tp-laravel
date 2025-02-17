<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractModelController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use App\Models\Box;

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Box
Route::get('/boxes', [BoxController::class, 'index'])->name('box.index');
Route::get('/boxes/create', [BoxController::class, 'create'])->name('box.create');
Route::post('/boxes', [BoxController::class, 'store'])->name('box.store');
Route::get('/boxes/{box}', [BoxController::class, 'show'])->name('box.show');
Route::get('/boxes/{box}/edit', [BoxController::class, 'edit'])->name('box.edit');
Route::put('/boxes/{box}', [BoxController::class, 'update'])->name('box.update');
Route::delete('/boxes/{box}', [BoxController::class, 'destroy'])->name('box.destroy');

// User
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}/reservation', [UserController::class, 'reservation'])->name('user.reservation');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

// Reservation
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

// ContratModels
Route::get('/contract-models', [ContractModelController::class, 'index'])->name('contract-model.index');
Route::get('/contract-models/create', [ContractModelController::class, 'create'])->name('contract-model.create');
Route::get('/contract-models/{contractModel}', [ContractModelController::class, 'show'])->name('contract-model.show');
Route::post('/contract-models', [ContractModelController::class, 'store'])->name('contract-model.store');
Route::get('/contract-models/{contractModel}/edit', [ContractModelController::class, 'edit'])->name('contract-model.edit');
Route::put('/contract-models/{contractModel}', [ContractModelController::class, 'update'])->name('contract-model.update');
Route::delete('/contract-models/{contractModel}', [ContractModelController::class, 'destroy'])->name('contract-model.destroy');

// Contrats
Route::get('/contracts', [ContractController::class, 'index'])->name('contract.index');
Route::get('/contracts/create', [ContractController::class, 'create'])->name('contract.create');
Route::get('/contracts/{contract}', [ContractController::class, 'show'])->name('contract.show');
Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])->name('contract.edit');
Route::put('/contracts/{contract}', [ContractController::class, 'update'])->name('contract.update');
Route::delete('/contracts/{contract}', [ContractController::class, 'destroy'])->name('contract.destroy');
Route::post('/contracts', [ContractController::class, 'store'])->name('contract.store');
Route::post('/contracts/generate', [ContractController::class, 'generate'])->name('contract.generate');

// Invoice
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoice.create');
Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoice.store');
Route::post('/invoices/generate', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate');

// Tax
Route::get('/taxes', [TaxController::class, 'index'])->name('tax.index');
Route::get('/taxes/create', [TaxController::class, 'create'])->name('tax.create');
Route::get('/taxes/{tax}', [TaxController::class, 'show'])->name('tax.show');
Route::get('/taxes/{tax}/edit', [TaxController::class, 'edit'])->name('tax.edit');
Route::put('/taxes/{tax}', [TaxController::class, 'update'])->name('tax.update');
Route::delete('/taxes/{tax}', [TaxController::class, 'destroy'])->name('tax.destroy');
Route::post('/taxes', [TaxController::class, 'store'])->name('tax.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
