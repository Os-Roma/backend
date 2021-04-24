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

    public function list_all_of_directors()
    {
        $response = $this->get('/api/auth/directors');
        $response->assertStatus(200);
    }

    public function filter_directors_for_name()
    {
        $response = $this->get('/api/auth/directors?name=Ana');
        $response->assertStatus(200);
    }

    public function cant_fetch_single_director()
    {   
    	$director = Director::first();
        $response = $this->get('/api/auth/directors/'.$director->slug );
        $response->assertStatus(200);
    }
}
