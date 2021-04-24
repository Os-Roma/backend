<?php

namespace Tests\Feature\Seasons;

use App\Models\Season;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listSeasonTest extends TestCase
{
    /**
     * @test */

    public function list_all_of_seasons()
    {
        $response = $this->get('/api/auth/seasons');
        $response->assertStatus(200);
    }

    public function filter_seasons_for_title()
    {
        $response = $this->get('/api/auth/seasons?title=Foo');
        $response->assertStatus(200);
    }

    public function cant_fetch_single_Season()
    {   
    	$season = Season::first();
        $response = $this->get('/api/auth/seasons/'.$season->slug );
        $response->assertStatus(200);
    }
}
