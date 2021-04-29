<?php

namespace Tests\Feature\Episodes;

use App\Models\Episode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListEpisodeTest extends TestCase
{
    /**
     * @test */

    public function list_all_episodes()
    {
        $response = $this->get('/api/auth/episodes');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_episodes_for_title()
    {
        $response = $this->get('/api/auth/episodes?title=Foo');
        $response->assertStatus(200);
    }

    /** @test */

    public function fetch_single_episode()
    {   
        $episode = Episode::first();
        $response = $this->get('/api/auth/episodes/'.$episode->slug );
        $response->assertStatus(200);
        $response->assertSee($episode->title);
    }
}
