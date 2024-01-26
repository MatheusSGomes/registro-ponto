<?php

use App\Models\Colaborador;
use App\Models\Feriado;
use Illuminate\Foundation\Testing\DatabaseTransactions;

// https://juststeveking.uk/articles/testing-api-responses-in-pest-php/
// https://regexr.com/

beforeEach(function () {
    $this->feriado = Feriado::factory()->create([
        'data' => now(),
        'descricao' => 'Feriado'
    ]);
});

test('verifica o retorno dos feriados contém data e descrição', function () {
    $feriado = $this->feriado;

    expect($feriado)
    ->toHaveKeys(['id', 'data', 'descricao'])
    ->not->toHaveKeys(['created_at', 'updated_at']);
});

test('verifica se a data está formatada (Y-m-d) e é uma string', function () {
    // prepare
    $feriado = $this->feriado;

    // act
    $data = $feriado->data->format('Y-m-d');
    $regex = preg_match('/\d{4}-\d{2}-\d{2}/', $data);

    // assert
    expect($regex)
        ->toBe(1);

    expect($data)
        ->toBeString();
});
