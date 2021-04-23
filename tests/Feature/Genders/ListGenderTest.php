<?php

namespace Tests\Feature\Genders;

use App\Models\Gender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListGenderTest extends TestCase
{
    /**
     * @test */

    public function cant_fetch_single_gender()
    {   
        $response = $this->get('genders');
        $response->assertStatus(200);
    }
}
