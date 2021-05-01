<?php

namespace Tests\Feature\Movies;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListMovieTest extends TestCase
{
    /** @test */

    public function list_all_movies()
    {
        $response = $this->get('/api/auth/movies');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_movies_for_name()
    {
        $response = $this->get('/api/auth/movies?title=foo');
        $response->assertStatus(200);
    }

    /** @test */

    public function fetch_single_movie()
    {   
    	$movie = Movie::first();
        $response = $this->get('/api/auth/movies/'.$movie->slug );
        $response->assertStatus(200);
        $response->assertSee($movie->title);
    }

}
