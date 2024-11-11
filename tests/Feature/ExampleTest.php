<?php

it('returns a successful response for homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(200)
             ->assertSee('fraud.cool')
             ->assertSee('Your one stop shop for biolink sites!');
});
