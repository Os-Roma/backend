<?php

namespace Tests\Feature\Actors;

use App\Models\Actor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SortActorsTest extends TestCase
{
    /** @test void */

    public function it_cant_sort_actors_by_name_asc()
     {
        $response = $this->getJson('/api/auth/actors?sort=name,birth_date');
        $response->assertStatus(200);
    }

    /** @test void */

    public function it_cant_sort_actors_by_name_desc()
     {
        $response = $this->getJson('/api/auth/actors?sort=-name,birth_date');
        $response->assertStatus(200);
    }
}
