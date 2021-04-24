<?php

namespace Tests\Unit\Gender;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Gender;
use Illuminate\Database\Eloquent\Collection;

class GenderTest extends TestCase
{
    /** @test */
    
    public function a_gender_belongs_to_many_movies()
    {
        $gender = new Gender;
        $this->assertInstanceOf(Collection::class, $gender->movies);
    }

    /** @test */

    public function a_gender_belongs_to_many_series()
    {
        $gender = new Gender;
        $this->assertInstanceOf(Collection::class, $gender->series);
    }
}
