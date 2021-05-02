<?php

namespace Tests\Unit\Genre;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;

class GenreTest extends TestCase
{
    /** @test */
    
    public function a_gender_belongs_to_many_movies()
    {
        $genre = new Genre;
        $this->assertInstanceOf(Collection::class, $genre->movies);
    }

    /** @test */

    public function a_gender_belongs_to_many_series()
    {
        $genre = new Genre;
        $this->assertInstanceOf(Collection::class, $genre->series);
    }
}
