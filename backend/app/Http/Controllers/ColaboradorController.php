<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Services\ColaboradorService;
use Illuminate\Http\Request;
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
        return $this->colaboradorService->createColaborador($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Colaborador $colaborador, int $colaborador_id)
    {
        return $colaborador->find($colaborador_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $colaborador_id)
    {
        return Colaborador::find($colaborador_id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colaborador $colaborador, int $colaborador_id)
    {
        return $colaborador->find($colaborador_id)->delete();
    }
}
