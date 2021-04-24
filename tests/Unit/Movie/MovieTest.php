<?php

namespace Tests\Unit\Movie;

use Tests\TestCase;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieTest extends TestCase
{
    /** @test */

    public function a_movie_morph_to_many_actors()
    {
        $movie = new Movie;
        $this->assertInstanceOf(Collection::class, $movie->actors);
    }

}
