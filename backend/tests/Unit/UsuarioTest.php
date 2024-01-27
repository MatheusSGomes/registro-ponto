<?php

// ATTRIBUTES:
// usuario
// email
// tipousuario_id
// 'password',

use App\Models\TipoUsuario;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->usuario = new Usuario();
});

test('verifica se atributo usuário é do tipo string', function () {
    $this->usuario->usuario = 'matheus';
    expect($this->usuario->usuario)->toBeString();
});

test('verifica se o atributo email é do tipo string', function () {
    $this->usuario->email = 'matheus@email.com';
    expect($this->usuario->email)->toBeString();
});

test('verifica se tipo usuário é int e pertence a tabela tipousuarios', function () {
    $this->usuario->tipousuario_id = '1';
    $tipoUsuario = TipoUsuario::find($this->usuario->tipousuario_id);
    expect($tipoUsuario->exists())->toBeTrue();
    expect($tipoUsuario->id)->toBe(1)->toBeInt();
});

test('verifica se cast para hash da senha é realizado', function () {
    $this->usuario->password = 'password';
    expect(Hash::isHashed($this->usuario->password))->toBeTrue();
});

test('verifica se senha criada pode ser validada com check', function () {
    $this->usuario->password = 'password';
    expect(Hash::check('password', $this->usuario->password))->toBeTrue();
});


