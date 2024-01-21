<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CargoController,
    ColaboradorController,
    FeriadoController,
    FuncaoController,
    HorarioController,
    UsuarioController};

Route::apiResource('colaboradores', ColaboradorController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('feriados', FeriadoController::class);

Route::apiResource('cargos', CargoController::class);
Route::apiResource('funcoes', FuncaoController::class);
Route::apiResource('tipousuario', FuncaoController::class);

Route::get('horarios-colaborador/{colaborador_id}', [HorarioController::class, 'getHorariosColaborador']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
