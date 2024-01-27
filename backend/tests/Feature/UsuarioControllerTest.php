<?php

it('has usuariocontroller page', function () {
    $response = $this->get('/usuariocontroller');

    $response->assertStatus(200);
});
