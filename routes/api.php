<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FilmController;

// -----------------------------
// Rotte pubbliche (guest)
// -----------------------------

// Lista di tutti i film
Route::get('/films', [FilmController::class, 'index']);

// Dettagli di un singolo film
Route::get('/films/{film}', [FilmController::class, 'show']);

// -----------------------------
// Rotte protette (solo utenti autenticati)
// -----------------------------
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/films', [FilmController::class, 'store']);
    Route::put('/films/{film}', [FilmController::class, 'update']);
    Route::delete('/films/{film}', [FilmController::class, 'destroy']);
});
