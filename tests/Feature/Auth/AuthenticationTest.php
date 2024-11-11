<?php

use App\Models\User;
use Livewire\Volt\Volt;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertOk()
             ->assertSeeVolt('pages.auth.login');
});

test('users can authenticate using email', function () {
    $user = User::factory()->create();

    $component = Volt::test('pages.auth.login')
        ->set('form.login', $user->email)
        ->set('form.password', 'password');

    $component->call('login');

    $component->assertHasNoErrors()
              ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();
});

test('users can authenticate using username', function () {
    $user = User::factory()->create();

    $component = Volt::test('pages.auth.login')
        ->set('form.login', $user->name)
        ->set('form.password', 'password');

    $component->call('login');

    $component->assertHasNoErrors()
              ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();
});

test('users cannot authenticate with invalid password', function () {
    $user = User::factory()->create();

    $component = Volt::test('pages.auth.login')
        ->set('form.login', $user->email)
        ->set('form.password', 'wrong-password');

    $component->call('login');

    $component->assertHasErrors()
              ->assertNoRedirect();

    $this->assertGuest();
});
