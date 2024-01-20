<?php

use App\Http\Controllers\ColaboradorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('colaboradores', ColaboradorController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
