<?php

it('returns a successful response for homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(200)
             ->assertSee('Empower Your Digital Presence Easy & Fast')
             ->assertSee('Transform your story into an online masterpiece. fraud.cool makes it easy to create personal, stunning bio-pages, that reflect your unique personality & creativity.');
});
