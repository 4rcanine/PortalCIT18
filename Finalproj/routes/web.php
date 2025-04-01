<?php // routes/web.php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes (like welcome page)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route - protected by auth middleware
// Change the closure to use the DashboardController
Route::get('/dashboard', [DashboardController::class, 'index']) // <-- Change this line
    ->middleware(['auth']) // Removed 'verified' earlier, keep as is for now
    ->name('dashboard');

// Other authenticated routes (like profile editing from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; // Includes login, register, etc. routes