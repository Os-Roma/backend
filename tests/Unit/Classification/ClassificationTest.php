<?php

namespace Tests\Unit\Classification;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Classification;
use Illuminate\Database\Eloquent\Collection;

class ClassificationTest extends TestCase
{
    /**
     * @test */

    public function a_classification_belongs_to_many_movies()
    {
        $classification = new Classification;
        $this->assertInstanceOf(Collection::class, $classification->movies);
    }

    public function a_classification_belongs_to_many_series()
    {
        $classification = new Classification;
        $this->assertInstanceOf(Collection::class, $classification->series);
    }
}
