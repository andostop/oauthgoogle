<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;

Route::get(
    '/usuario',
    [AuthController::class, 'usuario']
);

Route::get('/perfiles/{id}', [PerfilController::class, 'show']);

Route::post('/perfiles', [PerfilController::class, 'store']);

Route::put('/perfiles/{id}', [PerfilController::class, 'update']);