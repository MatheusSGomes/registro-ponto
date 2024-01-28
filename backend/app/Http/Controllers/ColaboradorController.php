<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Horario;
use App\Services\ColaboradorService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Mockery\Exception;

class ColaboradorController extends Controller
{
    public function __construct(
        private ColaboradorService $colaboradorService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Colaborador::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->colaboradorService->createColaborador(Collection::make($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(Colaborador $colaborador, string $colaborador_id)
    {
        return $colaborador->find($colaborador_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $colaborador_id)
    {
        return $this->colaboradorService->updateColaborador($request, $colaborador_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colaborador $colaborador, string $colaborador_id)
    {
        return $colaborador->find($colaborador_id)->delete();
    }
}
