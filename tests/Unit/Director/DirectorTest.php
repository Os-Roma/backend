<?php

namespace Tests\Unit\Director;

use Tests\TestCase;
use App\Models\Director;
use Illuminate\Database\Eloquent\Collection;

class DirectorTest extends TestCase
{
    /**
     * @test */

    public function a_director_belongs_to_many_movie()
    {
        $director = new Director;
        $this->assertInstanceOf(Collection::class, $director->movies);
    }

    public function a_director_belongs_to_many_episode()
    {
        $director = new Director;
        $this->assertInstanceOf(Collection::class, $director->episodes);
    }
}