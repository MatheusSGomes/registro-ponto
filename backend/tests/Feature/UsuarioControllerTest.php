<?php

// TESTED ROUTES:
// GET      api/usuarios
// POST     api/usuarios
// GET      api/usuarios/{usuario}
// PUT      api/usuarios/{usuario}
// DELETE   api/usuarios/{usuario}

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Sequence;
use function Pest\Laravel\{get, post};

beforeEach(function () {
    $this->urlBase = "/api/usuarios";

    // Apaga todos os usuários antes dos testes
    Usuario::destroy(Usuario::all()->pluck('id'));
});

test ('verifica se rota feriados retorna todos os usuários criados', function () {
    // prepare
    $usuarios = Usuario::factory()
        ->count(10)
        ->state(new Sequence(
            fn (Sequence $sequence) => [
                'usuario' => 'Usuário ' . $sequence->index,
                'email' => "user{$sequence->index}@email.com",
                'tipousuario_id' => random_int(1, 2),
                'password' => 'password'
            ]
        ))
        ->create();

    // act
    $response = get($this->urlBase);

    // assert
    $response
        ->assertJsonCount(10);

    expect($usuarios->count())
        ->toBe(10)
        ->toBeInt();
});

test ('verifica se é possível cadastrar um usuário', function () {
    // prepare
    $data = [
        'usuario' => 'Usuário Teste',
        'email' => "user-teste@email.com",
        'tipousuario_id' => random_int(1, 2),
        'password' => 'password'
    ];

    // act
    $response = post($this->urlBase, $data);

    // assert
    $response->assertCreated();
});

test ('verifica se é possível buscar por um usuário em específico recém cadastrado', function () {
    // prepare
    $data = [
        'usuario' => 'Usuário Teste',
        'email' => "user-teste@email.com",
        'tipousuario_id' => random_int(1, 2),
        'password' => 'password'
    ];

    $responseJsonPost = post($this->urlBase, $data)->json();
    $idUser = $responseJsonPost['id'];

    // act
    $responseJsonGet = get("$this->urlBase/$idUser")->json();

    // assert
    expect($responseJsonGet)->toContain($responseJsonPost['id']);
    expect($responseJsonGet)->toContain($responseJsonPost['usuario']);
    expect($responseJsonGet)->toContain($responseJsonPost['email']);
    expect($responseJsonGet)->toContain($responseJsonPost['tipousuario_id']);
})->only();

test ('verifica se na buscar por um usuário não retorna dados hidden', function () {
    // prepare
    $data = [
        'usuario' => 'Usuário Teste',
        'email' => "user-teste@email.com",
        'tipousuario_id' => random_int(1, 2),
        'password' => 'password'
    ];

    $responseJsonPost = post($this->urlBase, $data)->json();
    $idUser = $responseJsonPost['id'];

    // act
    $responseJsonGet = get("$this->urlBase/$idUser")->json();

    // assert
    expect($responseJsonGet)->not->toContain('password');
    expect($responseJsonGet)->not->toContain('remember_token');
    expect($responseJsonGet)->not->toContain('created_at');
    expect($responseJsonGet)->not->toContain('updated_at');
    expect($responseJsonGet)->not->toContain('email_verified_at');
});

//test ('', function () {});

//test ('', function () {});

//test('verifica se ao criar um usuário a senha está não está retornando', function () {});

afterEach(function () {
    // Apaga todos os usuários após cada teste
    Usuario::destroy(Usuario::all()->pluck('id'));
});
