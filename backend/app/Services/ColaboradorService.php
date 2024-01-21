<?php

namespace App\Services;

use App\Models\Colaborador;
use App\Models\Horario;

class ColaboradorService
{
    public function createColaborador($request)
    {
        $usuario = $this->createUsuarioName($request->nome);

        $colaborador = Colaborador::create([
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

        if ($request->horarios) {
            Horario::create(['colaborador_id' => $colaborador->id, ...$request->horarios]);
        }

        return $colaborador;
    }

    public function createUsuarioName($usuario)
    {
        $usuarioLowerCase = strtolower($usuario);
        $underlineUsuario = str_replace(' ', '_', $usuarioLowerCase);
        $colaborador = Colaborador::all()->last()?->id;

        return $underlineUsuario . $colaborador + 1;
    }
}
