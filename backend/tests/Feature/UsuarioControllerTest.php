<?php

// TESTED ROUTES:
// GET      api/usuarios
// POST     api/usuarios
// GET      api/usuarios/{feriado}
// PUT      api/usuarios/{feriado}
// DELETE   api/usuarios/{feriado}

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Sequence;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->urlBase = "/api/usuarios";
});

test ('verifica se rota feriados retorna todos os feriados criados', function () {
    // prepare
    Usuario::destroy(Usuario::all()->pluck('id'));

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
    $response->assertJsonCount(10);
})->only();

//test ('', function () {});

//test ('', function () {});

//test ('', function () {});

//test ('', function () {});




//it('has usuariocontroller page', function () {
//    $response = $this->get('/usuariocontroller');
//    $response->assertStatus(200);
//});

//test('verifica se ao criar um usuário a senha está não está retornando', function () {});

afterAll(function () {
    dump('apaga todos os usuários');
});
