<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'overview' => $this->faker->text(),
            'release_date' => now(),
            'director_id' => rand(1, 20),
            'genre_id' => rand(1, 5),
            'classification_id' => rand(1, 5)
        ];
    }
}
