<?php

use App\Models\TipoUsuario;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\post;

// https://medium.com/@DCzajkowski/testing-laravel-authentication-flow-573ea0a96318

beforeEach(function () {
    Usuario::destroy(Usuario::all()->pluck('id'));

    // Recupera tipos de usuário aleatório
    $this->tipousuario_id = TipoUsuario::all()->pluck('id')->random();
});

test('verifica se é possível fazer login', function () {
    // prepare
    Usuario::create([
        'usuario' => "usuario-teste",
        'email' => 'usuario@email.com',
        'tipousuario_id' => $this->tipousuario_id,
        'password' => 'password'
    ]);

    // act
    $auth = Auth::attempt([
        'usuario' => 'usuario-teste',
        'password' => 'password',
    ]);

    // assert
    expect($auth)->toBeTrue();
});

test('verifica se não é possível fazer login caso as credenciais estejam erradas', function () {
    // prepare
    Usuario::create([
        'usuario' => "usuario-teste",
        'email' => 'usuario@email.com',
        'tipousuario_id' => $this->tipousuario_id,
        'password' => 'password'
    ]);

    // act
    $auth = Auth::attempt([
        'usuario' => 'usuario-teste',
        'password' => 'senha-errada',
    ]);

    // assert
    expect($auth)->toBeFalse();
});

test('verifica se é possível fazer login pela rota /login e se o token é válido', function () {
    // prepare
    Usuario::create([
        'usuario' => "usuario-teste",
        'email' => 'usuario@email.com',
        'tipousuario_id' => $this->tipousuario_id,
        'password' => 'password'
    ]);

    // act
    $credentials = [
        'usuario' => 'usuario-teste',
        'password' => 'password',
    ];

    post('/api/login', $credentials)->json();

    // assert
    expect(Auth::check())->toBeTrue();
});

test('verifica se não é possível fazer login ao passar credenciais inválidas', function () {
    // prepare
    Usuario::create([
        'usuario' => "usuario-teste",
        'email' => 'usuario@email.com',
        'tipousuario_id' => $this->tipousuario_id,
        'password' => 'password'
    ]);

    // act
    $credentials = [
        'usuario' => 'usuario-teste',
        'password' => 'senha-errada',
    ];

    post('/api/login', $credentials)->json();

    // assert
    expect(Auth::check())->toBeFalse();
});

test('verifica se é possível fazer login via POST', function () {
    // prepare
    Usuario::create([
        'usuario' => "usuario-teste",
        'email' => 'usuario@email.com',
        'tipousuario_id' => $this->tipousuario_id,
        'password' => 'password'
    ]);

    // act
    $response = post('/api/login', [
        "usuario" => 'usuario-teste',
        "password" => 'password'
    ]);

    // assert
    $response->assertOk();
});

afterEach(function () {
    Usuario::destroy(Usuario::all()->pluck('id'));
});
