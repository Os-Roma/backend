<?php

namespace Tests\Unit\Director;

use Tests\TestCase;
use App\Models\Director;
use Illuminate\Database\Eloquent\Collection;

class DirectorTest extends TestCase
{
    /**
     * @test */

    public function a_director_has_many_movies()
    {
        $director = new Director;
        $this->assertInstanceOf(Collection::class, $director->movies);
    }

    public function a_director_has_many_episodes()
    {
        $director = new Director;
        $this->assertInstanceOf(Collection::class, $director->episodes);
    }
}