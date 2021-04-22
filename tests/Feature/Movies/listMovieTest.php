<?php

namespace Tests\Feature\Movies;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listMovieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_fetch_single_movie()
    {
        Movie::factory(1)->create()->each(function ($movie) {
            $movie->actors()->attach($this->array(rand(1, 50)));
        });

        $response->assertStatus(200);
    }

    public function array($max){
        $values = [];

        for ( $i=1; $i < $max; $i++ ){
            $values[] = $i;
        }
        return $values;
    }
}
