<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use Mockery\Exception;

class ColaboradorController extends Controller
{
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
        $usuario = $this->createUsuarioName($request->nome);

        return Colaborador::create([
            "cpf" => $request->cpf,
            "ativo" => $request->ativo,
            "nome" => $request->nome,
            "data_nascimento" => $request->data_nascimento,
            "data_admissao" => $request->data_admissao,
            "email" => $request->email,
            "cargo_id" => $request->cargo_id,
            "funcao_id" => $request->funcao_id,
            "data_recisao" => $request->data_recisao,
            "usuario" => $usuario,
        ]);
    }

    public function createUsuarioName($usuario)
    {
        $increment = 1;
        $usuarioLowerCase = strtolower($usuario);
        $underlineUsuario = str_replace(' ', '_', $usuarioLowerCase);
        $colaborador = Colaborador::all()->last()->id;

        return $underlineUsuario . $colaborador + 1;
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
