<?php

namespace Tests\Feature\Series;

use App\Models\Serie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListSerieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test 
     */
    public function can_fetch_single_serie()
    {
        Serie::factory()->create();

        $response->assertStatus(200);
    }
}
