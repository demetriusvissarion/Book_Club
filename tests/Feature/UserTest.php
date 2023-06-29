<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    /** @test */
    public function homepage_is_visible_to_guests(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    // public function admin_dashboard_contains_user_livewire_component(): void
    // {
    //     $this->get('/users')->assertSeeLivewire('users');
    // }
}
