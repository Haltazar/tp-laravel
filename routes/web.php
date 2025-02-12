<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\Box;

Route::get('/', function () {
    return view('home', [
        'boxes' => Box::all(),
    ]);
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Box
Route::get('/box', [BoxController::class, 'index'])->name('box.index');
Route::get('/box/create', [BoxController::class, 'create'])->name('box.create');
Route::post('/box', [BoxController::class, 'store'])->name('box.store');
Route::get('/box/{box}', [BoxController::class, 'show'])->name('box.show');
Route::get('/box/{box}/edit', [BoxController::class, 'edit'])->name('box.edit');
Route::put('/box/{box}', [BoxController::class, 'update'])->name('box.update');
Route::delete('/box/{box}', [BoxController::class, 'destroy'])->name('box.destroy');

// User
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}/reservation', [UserController::class, 'reservation'])->name('user.reservation');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

// Reservation
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::get('/reservation/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
Route::get('/reservation/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservation/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
