<?php

namespace Tests\Unit\Actor;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Actor;
use Illuminate\Database\Eloquent\Collection;

class ActorTest extends TestCase
{
    /** 
    * @test */

    public function a_actor_morphed_by_many_movie()
    {
        $actor = new Actor;
        $this->assertInstanceOf(Collection::class, $actor->movies);
    }

    public function a_actor_morphed_by_many_episode()
    {

        $actor = new Actor;
        $this->assertInstanceOf(Collection::class, $actor->episodes);
    }
}
