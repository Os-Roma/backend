<?php

namespace Tests\Feature\Series;

use App\Models\Serie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListSerieTest extends TestCase
{
    // use RefreshDatabase;
    /** @test */

    public function list_all_series()
    {
        $response = $this->get('/api/auth/series');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_series_for_title()
    {
        $response = $this->get('/api/auth/series?title=foo');
        $response->assertStatus(200);
    }

    /** @test */

    public function fetch_single_serie()
    {   
        $this->WithoutExceptionHandling();
    	$serie = Serie::first();
        $response = $this->get('/api/auth/series/'.$serie->slug );
        $response->assertStatus(200);
        $response->assertSee($serie->title);
        
    }

}
