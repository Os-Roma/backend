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

    public function list_all_classifications()
    {   
        $response = $this->get('/api/auth/classifications');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_classifications_for_name()
    {
        $response = $this->get('/api/auth/classifications?name=foo');
        $response->assertStatus(200);
    }

    /** @test */

    public function fetch_single_classification()
    {   
    	$classification = Classification::first();
        $response = $this->get('/api/auth/classifications/'.$classification->slug );
        $response->assertStatus(200);
        $response->assertSee($classification->name);
    }
}
