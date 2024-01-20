<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ColaboradorController,
    UsuarioController
};

Route::apiResource('colaboradores', ColaboradorController::class);
Route::apiResource('usuarios', UsuarioController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
