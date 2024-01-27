<?php

use App\Models\Colaborador;
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

test('verifica se o ativo é boolean', function () {});

test('verifica se o nome é string', function () {});

test('verifica se data_nascimento está no formato esperado (Y-m-d)', function () {});

test('verifica se data_admissao está no formato esperado (Y-m-d)', function () {});

test('verifica se cargo_id tem relacionamento com a tabela cargos', function () {});

test('verifica se funcao_id tem relacionamento com a tabela funcoes', function () {});

test('verifica se data_recisao está no formato esperado (Y-m-d)', function () {});

test('verifica se usuario é cadastrado automaticamente ao criar um novo colaborador)', function () {});

afterEach(function () {});
