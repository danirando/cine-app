<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FilmController;

// Homepage pubblica
Route::view('/', 'welcome');

// Rotte protette da autenticazione
// routes/web.php


Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD Film
        Route::resource('films', FilmController::class);
    });

require __DIR__.'/auth.php';
