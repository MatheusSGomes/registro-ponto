<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AutenticacaoController,
    CargoController,
    ColaboradorController,
    ControlePontoController,
    FeriadoController,
    FuncaoController,
    HorarioController,
    UsuarioController};

Route::post('login', [AutenticacaoController::class, 'login']);

Route::apiResource('colaboradores', ColaboradorController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('feriados', FeriadoController::class);

Route::apiResource('cargos', CargoController::class);
Route::apiResource('funcoes', FuncaoController::class);
Route::apiResource('tipousuario', FuncaoController::class);

Route::get('horarios-colaborador/{colaborador_id}', [HorarioController::class, 'getHorariosColaborador']);

Route::get('ponto/{colaborador_id}', [ControlePontoController::class, 'getRegistrosPonto']);
Route::post('ponto', [ControlePontoController::class, 'registrarPonto']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
