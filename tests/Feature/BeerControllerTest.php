<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class BeerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_returns_view_with_token()
    {

        $user = User::factory()->create();
        $this->actingAs($user); //Auth
        $response = $this->get(route('beers.index'));
        $response->assertStatus(200);
        $response->assertViewHas('token', $user->access_token);
    }

    /** @test */
    public function data_returns()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->access_token,
        ])->getJson(route('beers.data'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data'
        ]);
     }
     /** @test */
    public function total_returns()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->access_token,
        ])->getJson(route('beers.total'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'total_items'
        ]);
     }
}
