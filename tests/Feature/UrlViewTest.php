<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Links;
use App\Models\LinkTypes;
use App\Models\UrlView;
use Tests\TestCase;

class UrlViewTest extends TestCase
{
    public function test_redirect_with_invalid_username_returns_to_index()
    {
        $response = $this->get('/redirect/nonexistentuser/1');

        $response->assertRedirect(route('index'));
    }

    public function test_redirect_with_invalid_link_id_returns_to_index()
    {
        $user = User::factory()->create();

        $response = $this->get("/redirect/{$user->name}/999");

        $response->assertRedirect(route('index'));
    }

    public function test_valid_url_view_is_recorded()
    {
        // Create necessary test data
        $user = User::factory()->create();
        $linkType = LinkTypes::create([
            'name' => 'test-type',
            'label' => 'Test Type',
            'icon' => 'test-icon',
            'placeholder' => 'https://test.com'
        ]);
        
        $link = Links::create([
            'user_id' => $user->id,
            'link_type_id' => $linkType->id,
            'url' => 'https://example.com'
        ]);

        // Make the request
        $response = $this->get("/redirect/{$user->name}/{$link->id}");

        // Assert URL view was recorded
        $this->assertDatabaseHas('url_views', [
            'user_id' => $user->id,
            'link_id' => $link->id,
        ]);

        // Get the recorded view
        $urlView = UrlView::where('user_id', $user->id)
            ->where('link_id', $link->id)
            ->first();

        // Assert view count was incremented
        $this->assertEquals(1, $urlView->views);
    }

    public function test_multiple_views_increment_counter()
    {
        // Create necessary test data
        $user = User::factory()->create();
        $linkType = LinkTypes::create([
            'name' => 'test-type',
            'label' => 'Test Type',
            'icon' => 'test-icon',
            'placeholder' => 'https://test.com'
        ]);
        
        $link = Links::create([
            'user_id' => $user->id,
            'link_type_id' => $linkType->id,
            'url' => 'https://example.com'
        ]);

        // Make multiple requests
        $this->get("/redirect/{$user->name}/{$link->id}");
        $this->get("/redirect/{$user->name}/{$link->id}");
        $this->get("/redirect/{$user->name}/{$link->id}");

        // Get the recorded view
        $urlView = UrlView::where('user_id', $user->id)
            ->where('link_id', $link->id)
            ->first();

        // Assert view count was incremented correctly
        $this->assertEquals(3, $urlView->views);
    }
}
