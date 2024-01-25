<?php

use App\Models\Colaborador;
use App\Models\Feriado;
use Illuminate\Foundation\Testing\DatabaseTransactions;

test('valida se existe existe os atributos data e descricao', function () {
    $data = "25-01-2024";
    $descricao = "Natal";

    $feriado = new Feriado([
        "data" => $data,
        "descricao" => $descricao,
    ]);

    expect($feriado->data)
        ->toBe($data)
        ->toBeString();

    expect($feriado->descricao)
        ->toBe($descricao)
        ->toBeString();
})->uses(DatabaseTransactions::class);
