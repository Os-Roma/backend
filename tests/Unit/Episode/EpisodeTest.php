<?php

namespace Tests\Unit\Episode;

use Tests\TestCase;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Collection;

class EpisodeTest extends TestCase
{
    /** @test */
    
    public function a_episode_morph_to_many_actors()
    {
        $episode = new Episode;
        $this->assertInstanceOf(Collection::class, $episode->actors);
    }
}
