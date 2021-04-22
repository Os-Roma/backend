<?php

namespace Tests\Feature\Actors;

use App\Models\Actor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listActorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function cant_fetch_single_actor()
    {   
        Actor::factory(50)->create();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
