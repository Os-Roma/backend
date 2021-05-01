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
        $response = $this->getJson('/api/auth/actors');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_actors_for_name()
    {
        $response = $this->get('/api/auth/actors?name=Foo');
        $response->assertStatus(200);
    }

    /** @test */
    
    public function fetch_single_actor()
    {   
        $actor = Actor::first();
        $response = $this->getJson('/api/auth/actors/'.$actor->getRouteKey());

        $response->assertStatus(200);
        $response->assertExactJson([
            'data' => [
                'type' => 'actors',
                'id' => (string) $actor->getRouteKey(),
                'attributes' => [
                    'name' => $actor->name,
                    'slug' => $actor->slug,
                    'birth_date' => $actor->bith_date,
                ],
                'links' => [
                    'self' => url('/api/auth/actors/'.$actor->getRouteKey())
                ]
            ]
        ]);
    }
}
