<?php

namespace Tests\Feature\Genders;

use App\Models\Gender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListGenderTest extends TestCase
{
    /** @test */

    public function list_all_genders()
    {
        $response = $this->get('/api/auth/genders');
        $response->assertStatus(200);
    }

    /** @test */

    public function filter_genders_for_name()
    {
        $response = $this->get('/api/auth/genders?title=foo');
        $response->assertStatus(200);
    }

    /** @test */

    public function fetch_single_gender()
    {   
    	$gender = Gender::first();
        $response = $this->get('/api/auth/genders/'.$gender->slug );
        $response->assertStatus(200);
    }

}
