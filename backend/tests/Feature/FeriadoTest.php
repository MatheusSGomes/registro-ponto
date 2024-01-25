<?php

use App\Models\Colaborador;
use Illuminate\Foundation\Testing\DatabaseTransactions;

// https://juststeveking.uk/articles/testing-api-responses-in-pest-php/
// https://regexr.com/

beforeEach(function () {
    $this->feriadoResponse = Http::get('http://localhost:8000/api/feriados')->json();
});

test('verifica o retorno dos feriados contém data e descrição', function () {
    $firstFeriado = $this->feriadoResponse[0];
    expect($firstFeriado)
    ->toHaveKeys(['id', 'data', 'descricao'])
    ->not->toHaveKeys(['created_at', 'updated_at']);
});

test('verifica se data é uma string', function () {
    $firstFeriado = $this->feriadoResponse[0];
    $data = $firstFeriado['data'];

    expect($data)
        ->toBeString();
});

test('verifica se a data está formatada (Y-m-d)', function () {
    $firstFeriado = $this->feriadoResponse[0];
    $data = $firstFeriado['data'];
    $regex = preg_match('/\d{4}-\d{2}-\d{2}/', $data);

    expect($regex)
        ->toBe(1);
});
