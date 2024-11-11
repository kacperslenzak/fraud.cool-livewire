<?php

use App\Models\User;
use App\Models\ProfileSettings;

test('user can update profile settings', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
         ->post(route('dashboard.update'), [
             'description' => 'Test Bio',
             'card_opacity' => 80,
             'show_uid' => true,
             'show_views' => false,
         ])
         ->assertRedirect();

    $this->assertDatabaseHas('profile_settings', [
        'user_id' => $user->id,
        'description' => 'Test Bio',
        'card_opacity' => 80,
        'show_uid' => true,
        'show_views' => false,
    ]);
});

test('card opacity must be between 0 and 100', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
         ->post(route('dashboard.update'), [
             'description' => 'Test Bio',
             'card_opacity' => 101,
             'show_uid' => true,
             'show_views' => true,
         ])
         ->assertSessionHasErrors('card_opacity');
});

test('description cannot exceed 255 characters', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
         ->post(route('dashboard.update'), [
             'description' => str_repeat('a', 256),
             'card_opacity' => 100,
             'show_uid' => true,
             'show_views' => true,
         ])
         ->assertSessionHasErrors('description');
}); 