<?php

use App\Models\Colaborador;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\post;

// Controller: ColaboradorController

test ('verifica se a rota de listagem de colaboradores retorna uma resposta válida', function () {
    $response = $this->get('/api/colaboradores');
    $response->assertStatus(200);
})->uses(DatabaseTransactions::class);

test('verifica se é possível cadastrar um colaborador', function () {
    // prepare
    $data  = [
        "cpf" => "123.123.123-23",
        "ativo" => true,
        "nome" => "Colaborador Teste",
        "data_nascimento" => "01-10-1995",
        "data_admissao" => "28-01-2024",
        "email" => "colaborador@gmail.com",
        "cargo_id" => 1,
        "funcao_id" => 1,
        "data_recisao" => "28-01-2026",
        "usuario" => "colaborador-teste",
    ];

    // act
    $response = post('/api/colaboradores', $data);

    // assert
    $response->assertCreated();
});

