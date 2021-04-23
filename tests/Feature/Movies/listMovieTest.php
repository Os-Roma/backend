<?php

namespace Tests\Feature\Movies;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listMovieTest extends TestCase
{
    /**
     * @test */

    public function can_fetch_single_movie()
    {
        $response = $this->get('movies');
        $response->assertStatus(200);
    }

}
