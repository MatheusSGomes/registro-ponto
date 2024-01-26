<?php

use App\Models\Colaborador;
use App\Models\Feriado;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\get;

// prepare
// act
// assert

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


test('pode carregar todos os posts', function () {
    // prepare
    $hoje = now();

    $feriado = Feriado::factory()->create([
        'descricao' => 'Feriado Teste 1',
        'data' => $hoje,
    ]);

    // act
    $response = get('/api/feriados');

    // asserts
    $response->assertOk();
    expect($feriado->descricao)->toBe('Feriado Teste 1');
    expect($feriado->data)->toBe($hoje);
})->uses(DatabaseTransactions::class);
