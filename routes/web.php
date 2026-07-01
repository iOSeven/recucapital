<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonnelController;

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Personnel routes
    Route::get('/dashboard/company/{company}', [PersonnelController::class, 'index'])
        ->name('personnel.index');

    Route::post('/dashboard/company/{company}/sync', [PersonnelController::class, 'sync'])
        ->name('personnel.sync');

    Route::get('/dashboard/company/{company}/export', [PersonnelController::class, 'export'])
        ->name('personnel.export');
});

require __DIR__.'/auth.php';
