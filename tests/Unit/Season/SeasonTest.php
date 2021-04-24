<?php

namespace Tests\Unit\Season;

use Tests\TestCase;
use App\Models\Season;
use Illuminate\Database\Eloquent\Collection;

class SeasonTest extends TestCase
{
    /** @test */
    
    public function a_season_has_many_episodes()
    {
        $season = new Season;
        $this->assertInstanceOf(Collection::class, $season->episodes);
    }
}

