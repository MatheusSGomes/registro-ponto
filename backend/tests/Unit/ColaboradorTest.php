<?php

use App\Models\Cargo;
use App\Models\Colaborador;
use App\Models\Funcao;
use App\Services\ColaboradorService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;

beforeEach(function () {
    Colaborador::destroy(Colaborador::all()->pluck('id'));
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
});

test('verifica se cargo_id tem relacionamento com a tabela cargos', function () {
    $this->colaborador->cargo_id = 1;
    $cargoExists = Cargo::find(1)->exists();

    expect((bool) $this->colaborador->cargo_id)
        ->toBeTrue($cargoExists);
});

test('verifica se funcao_id tem relacionamento com a tabela funcoes', function () {
    $this->colaborador->funcao_id = 1;
    $funcaoExists = Funcao::find(1)->exists();

    expect((bool) $this->colaborador->funcao_id)
        ->toBeTrue($funcaoExists);
});

test('verifica se data_recisao recebeu o cast para o formato: Y-m-d', function () {
    $this->colaborador->data_recisao = '01-12-2024';

    expect($this->colaborador->data_recisao)
        ->toBeInstanceOf(Carbon::class);
});

test('verifica se usuario é cadastrado automaticamente ao criar um novo colaborador', function () {
    $colaboradorService = new ColaboradorService();
    $collection = Collection::make([
        "cpf" => "123.123.123-25",
        "ativo" => true,
        "nome" => "Matheus",
        "data_nascimento" => "01-01-1995",
        "data_admissao" => "25-01-2024",
        "email" => "matheus2@gmail.com",
        "cargo_id" => 1,
        "funcao_id" => 1,
        "data_recisao" => "25-01-2026",
        "usuario" => "matheus_gomes"
    ]);
    $colaborador = $colaboradorService->createColaborador($collection);

    expect($colaborador->usuario)
        ->not->toBe($collection->get('usuario'));
});

afterEach(function () {
    Colaborador::destroy(Colaborador::all()->pluck('id'));
});
