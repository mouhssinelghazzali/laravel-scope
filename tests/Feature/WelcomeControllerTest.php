<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Livre;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeControllerTest extends TestCase
{   
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/');
    $response->assertStatus(200);
    }
}
