<?php

namespace Tests\Feature\Classifications;

use App\Models\Classification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListClassificationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function cant_fetch_single_classification()
    {   

        Classification::factory(5)->create();
        
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
