<?php

namespace Tests\Feature\Episodes;

use App\Models\Episode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listEpisodeTest extends TestCase
{
    /**
     * @test */

    public function list_all_of_episodes()
    {
        $response = $this->get('/api/auth/episodes');
        $response->assertStatus(200);
    }

    public function filter_episodes_for_title()
    {
        $response = $this->get('/api/auth/episodes?title=Foo');
        $response->assertStatus(200);
    }

    public function cant_fetch_single_episode()
    {   
        $episode = Episode::first();
        $response = $this->get('/api/auth/episodes/'.$episode->slug );
        $response->assertStatus(200);
    }
}
