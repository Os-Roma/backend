<?php

namespace Tests\Feature\Series;

use App\Models\Serie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListSerieTest extends TestCase
{
    /**
     * @test */

    public function can_fetch_single_serie()
    {
        $response = $this->get('series');
        $response->assertStatus(200);
    }
}
