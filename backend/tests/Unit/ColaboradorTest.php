<?php

use App\Models\Colaborador;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

beforeEach(function () {
    $this->colaborador = new Colaborador();
});

test('verifica se o cpf está sendo salvo sem máscara', function () {
    $this->colaborador->cpf = '123.123.123-23';
    $valueReplaced = preg_replace('/\D/','${1}', '123.123.123-23');

    expect($this->colaborador->cpf)
        ->toEqual($valueReplaced)
        ->toEqual('12312312323');
});

test('verifica se o ativo é boolean', function () {
    $this->colaborador->ativo = 'true';
    expect($this->colaborador->ativo)
        ->toBeTrue()
        ->toBeBool();
});

test('verifica se o nome é string', function () {
    $this->colaborador->nome = 'Nome de Teste';
    expect($this->colaborador->nome)
        ->toBeString();
});

test('verifica se data_nascimento recebeu o cast para o formato: Y-m-d', function () {
    $this->colaborador->data_nascimento = '01-12-2024';

    expect($this->colaborador->data_nascimento)
        ->toBeInstanceOf(Carbon::class);
});

test('verifica se data_admissao recebeu o cast para o formato: Y-m-d', function () {
    $this->colaborador->data_admissao = '01-12-2024';

    expect($this->colaborador->data_admissao)
        ->toBeInstanceOf(Carbon::class);
})->only();

test('verifica se cargo_id tem relacionamento com a tabela cargos', function () {});

test('verifica se funcao_id tem relacionamento com a tabela funcoes', function () {});

test('verifica se data_recisao recebeu o cast para o formato: Y-m-d', function () {});

test('verifica se usuario é cadastrado automaticamente ao criar um novo colaborador)', function () {});

afterEach(function () {});
