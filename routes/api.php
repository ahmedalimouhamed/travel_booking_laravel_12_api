<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VoyageController;
use App\Http\Controllers\Api\FournisseurController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\PaiementController;
use App\Http\Controllers\Api\AvisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HistoriqueActiviteController;
use App\Http\Controllers\Api\DashboardController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('voyages', VoyageController::class);
    Route::apiResource('fournisseurs', FournisseurController::class);
    Route::apiResource('paiements', PaiementController::class);
    Route::apiResource('avis', AvisController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('reservations', ReservationController::class);

    Route::post('/tags/{tag}/voyages/{voyage}', [TagController::class, 'attachVoyage']);
    Route::get('/historique', [HistoriqueActiviteController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'stats']);
});
