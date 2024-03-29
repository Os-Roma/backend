<?php

namespace Tests\Feature\Directors;

use App\Models\Director;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListDirectorTest extends TestCase
{
    /** @test */

    public function list_all_directors()
    {
        $response = $this->getJson('/api/auth/directors');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_directors_for_name()
    {
        $response = $this->getJson('/api/auth/directors?name=foo');
        $response->assertStatus(200);
    }

    /** @test */

    public function fetch_single_director()
    {   
    	$director = Director::first();
        $response = $this->getJson('/api/auth/directors/'.$director->slug );
        $response->assertStatus(200);
        // $response->assertSee($director->name);
    }

}
