<?php

namespace Tests\Feature\Auth;

use Livewire\Volt\Volt;
use App\Models\User;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response
        ->assertOk()
        ->assertSeeVolt('pages.auth.register');
});

test('new users can register', function () {
    $component = Volt::test('pages.auth.register')
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password');

    $component->call('register');

    $component->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();
});

test('users cannot register with case-insensitive duplicate username', function () {
    // Create a user with lowercase username
    $existingUser = User::factory()->create([
        'name' => 'testuser'
    ]);

    // Try to register with the same username in different case
    $component = Volt::test('pages.auth.register')
        ->set('name', 'TestUser')
        ->set('email', 'different@example.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password');

    $component->call('register');

    $component->assertHasErrors(['name']);
});
