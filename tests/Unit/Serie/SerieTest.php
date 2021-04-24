<?php

namespace Tests\Unit\Serie;

use Tests\TestCase;
use App\Models\Serie;
use Illuminate\Database\Eloquent\Collection;

class SerieTest extends TestCase
{
    /** @test */
    
    public function a_serie_has_many_seasons()
    {
        $serie = new Serie;
        $this->assertInstanceOf(Collection::class, $serie->seasons);
    }

    /** @test */
    
    public function a_serie_has_many_episodes()
    {
        $serie = new Serie;
        $this->assertInstanceOf(Collection::class, $serie->episodes);
    }
}
