<?php

namespace Tests\Feature\Series;

use App\Models\Serie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListSerieTest extends TestCase
{
    /** @test */

    public function list_all_of_series()
    {
        $response = $this->get('/api/auth/series');
        $response->assertStatus(200);
    }

    public function filter_series_for_name()
    {
        $response = $this->get('/api/auth/series?title=foo');
        $response->assertStatus(200);
    }

    public function cant_fetch_single_serie()
    {   
    	$serie = Serie::first();
        $response = $this->get('/api/auth/series/'.$serie->slug );
        $response->assertStatus(200);
    }
}
