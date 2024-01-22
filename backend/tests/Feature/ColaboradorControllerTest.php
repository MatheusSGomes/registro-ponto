<?php

use App\Models\Colaborador;
use Illuminate\Foundation\Testing\DatabaseTransactions;

// Controller: ColaboradorController

it('verifica se a rota de listagem de colaboradores retorna uma resposta válida', function () {
    $response = $this->get('/api/colaboradores');
    $response->assertStatus(200);
})->uses(DatabaseTransactions::class);
