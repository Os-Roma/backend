<?php

namespace Tests\Feature\Actors;

use App\Models\Actor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listActorTest extends TestCase
{
    /**
     * @test */

    public function list_all_of_actors()
    {
        $response = $this->get('/api/auth/actors');
        $response->assertStatus(200);
    }

    public function filter_actors_for_name()
    {
        $response = $this->get('/api/auth/actors?name=Ana');
        $response->assertStatus(200);
    }

    public function cant_fetch_single_actor()
    {   
    	$actor = Actor::first();
        $response = $this->get('/api/auth/actors/'.$actor->slug );
        $response->assertStatus(200);
    }
}
