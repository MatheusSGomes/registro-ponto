<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function getHorariosColaborador(string $id)
    {
        return Horario::query()
            ->where('colaborador_id', $id)
            ->first();
    }
}
