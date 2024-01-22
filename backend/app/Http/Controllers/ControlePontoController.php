<?php

namespace App\Http\Controllers;

use App\Models\ControlePonto;
use Carbon\Carbon;
use Illuminate\Http\Request;

date_default_timezone_set('America/Sao_Paulo');

class ControlePontoController extends Controller
{
    public function getRegistrosPonto(int $colaborador_id)
    {
        $data = Carbon::now()->format('d-m-Y');

        return ControlePonto::query()
            ->where('colaborador_id', $colaborador_id)
            ->where('data', $data)
            ->withOnly('colaborador')
            ->get();
    }

    public function registrarPonto(Request $request)
    {
        $horario = Carbon::now()->format('H:i');
        $data = Carbon::now()->format('d-m-Y');

        return ControlePonto::create([
            "colaborador_id" => $request->colaborador_id,
            "data" => $data,
            "horario" => $horario,
            "latitude" => $request->localizacao['latitude'],
            "longitude" => $request->localizacao['longitude'],
        ]);
    }
}
