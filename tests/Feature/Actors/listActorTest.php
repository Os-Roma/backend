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

    public function cant_fetch_single_actor()
    {   
        $response = $this->get('actors');
        $response->assertStatus(200);
    }
}
