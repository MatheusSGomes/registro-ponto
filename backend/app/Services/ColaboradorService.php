<?php

namespace App\Services;

use App\Models\Colaborador;
use App\Models\Horario;
use Illuminate\Http\Request;

class ColaboradorService
{
    public function createColaborador($colaboradorData)
    {
        $usuario = $this->createUsuarioName($colaboradorData->get('nome'));

        $colaborador = Colaborador::create([
            "cpf" => $colaboradorData->get('cpf'),
            "ativo" => ($colaboradorData->get('ativo')) ? true : false,
            "nome" => $colaboradorData->get('nome'),
            "data_nascimento" => $colaboradorData->get('data_nascimento'),
            "data_admissao" => $colaboradorData->get('data_admissao'),
            "email" => $colaboradorData->get('email'),
            "cargo_id" => $colaboradorData->get('cargo_id'),
            "funcao_id" => $colaboradorData->get('funcao_id'),
            "data_recisao" => $colaboradorData->get('data_recisao'),
            "usuario" => $usuario,
        ]);

        if ($colaboradorData->get('horarios')) {
            Horario::create(['colaborador_id' => $colaborador->id, ...$colaboradorData->get('horarios')]);
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

    public function updateColaborador(Request $request, int $colaborador_id)
    {
        $horarios = $request->horarios;

        if ($horarios) {
            unset($horarios['colaborador_id']);
            unset($horarios['id']);

            Horario::query()
                ->where('colaborador_id', $colaborador_id)
                ->update($horarios);
        }

        $updateData = $request->all();

        return Colaborador::find($colaborador_id)->update($updateData);
    }
}
