<?php

namespace Tests\Feature\Actors;

use App\Models\Actor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListActorTest extends TestCase
{
    /** @test */

    public function list_all_actors()
    {
        $response = $this->get('/api/auth/actors');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_actors_for_name()
    {
        $response = $this->get('/api/auth/actors?name=Ana');
        $response->assertStatus(200);
    }

    /** @test */
    
    public function fetch_single_actor()
    {   
        $actor = Actor::first();
        $response = $this->get('/api/auth/actors/'.$actor->slug );
        $response->assertStatus(200);
    }
}
