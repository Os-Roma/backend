<?php

namespace Tests\Feature\Genders;

use App\Models\Gender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListGenderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function cant_fetch_single_gender()
    {   

        Gender::factory(5)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
