<?php

namespace Tests\Feature\Directors;

use App\Models\Director;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listDirectorTest extends TestCase
{
    /**
     * @test */

    public function cant_fetch_single_director()
    {   
        $response = $this->get('directors');
        $response->assertStatus(200);
    }
}
