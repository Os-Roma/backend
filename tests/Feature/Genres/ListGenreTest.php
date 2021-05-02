<?php

namespace Tests\Feature\Genres;

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListGenreTest extends TestCase
{
    /** @test */

    public function list_all_genres()
    {
        $response = $this->get('/api/auth/genres');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_genres_for_name()
    {
        $response = $this->get('/api/auth/genres?title=foo');
        $response->assertStatus(200);
    }

    /** @test */

    public function fetch_single_genre()
    {   
    	$genre = Genre::first();
        $response = $this->get('/api/auth/genres/'.$genre->slug );
        $response->assertStatus(200);
        $response->assertSee($genre->name);
    }

}
