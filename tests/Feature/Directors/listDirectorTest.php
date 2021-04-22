<?php

namespace Tests\Feature\Directors;

use App\Models\Director;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class listDirectorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test 
     */
    public function cant_fetch_single_director()
    {   

        Director::factory(20)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
