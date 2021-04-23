<?php

namespace Tests\Feature\Classifications;

use App\Models\Classification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListClassificationTest extends TestCase
{
    /**
     * @test */

    public function cant_fetch_single_classification()
    {   
        $response = $this->get('classifications');
        $response->assertStatus(200);
    }
}
