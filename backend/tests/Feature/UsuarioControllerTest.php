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

//test ('', function () {});

//test ('', function () {});

//test ('', function () {});

//it('has usuariocontroller page', function () {
//    $response = $this->get('/usuariocontroller');
//    $response->assertStatus(200);
//});

//test('verifica se ao criar um usuário a senha está não está retornando', function () {});

afterEach(function () {
    // Apaga todos os usuários após cada teste
    Usuario::destroy(Usuario::all()->pluck('id'));
});
