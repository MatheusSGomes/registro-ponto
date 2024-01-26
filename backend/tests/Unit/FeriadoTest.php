<?php

use App\Models\Colaborador;
use App\Models\Feriado;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

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

test ('não é possível criar um feriado sem o campo data', function () {
    $response = post('/api/feriados', [
        'data' => now(),
    ]);
    $response->assertStatus(500);
})->uses(DatabaseTransactions::class);

test ('não é possível criar um feriado sem o campo descricao', function () {
    $response = post('/api/feriados', [
        'descricao' => 'Descrição de teste',
    ]);
    $response->assertServerError();
})->uses(DatabaseTransactions::class);

test('feriado retorna corretamente', function () {
    // prepare
    $data =  now()->format('Y-m-d');
    $attributes = Feriado::factory()->create([
        'data' => $data,
        'descricao' => 'Descrição do Feriado',
    ])->toArray();

    // act
    $response = post('/api/feriados', $attributes);

    // assert
    $response->assertCreated()->assertJson([
        'data' => $data,
        'descricao' => 'Descrição do Feriado',
    ]);
})->uses(DatabaseTransactions::class);

test('busca por feriado recém criado usando id', function () {
    $data = now()->format('Y-m-d');
    $feriado = Feriado::factory()->create([
        'data' => $data,
        'descricao' => 'Descrição de Teste',
    ]);

    $response = get("/api/feriados/{$feriado->id}");

    $response->assertStatus(200)->assertJson($response->json());
})->uses(DatabaseTransactions::class)->only();
