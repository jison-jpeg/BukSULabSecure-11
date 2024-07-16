<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'redirectToDashboard'])->name('dashboard');
    });
    
require __DIR__.'/auth.php';
