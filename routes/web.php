<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
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
Route::get('/box/create', [BoxController::class, 'create'])->name('box.create');
Route::post('/box', [BoxController::class, 'store'])->name('box.store');
Route::get('/box/{box}', [BoxController::class, 'show'])->name('box.show');
Route::get('/box/{box}/edit', [BoxController::class, 'edit'])->name('box.edit');
Route::put('/box/{box}', [BoxController::class, 'update'])->name('box.update');
Route::delete('/box/{box}', [BoxController::class, 'destroy'])->name('box.destroy');

// Route::get('/box', [BoxController::class, 'index'])->name('box.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
