<?php

namespace Database\Factories;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Factories\Factory;

class SerieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Serie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence(4),
            'overview' => $this->faker->text(),
            'release_date' => now(),
            'gender_id' => rand(1, 5),
            'classification_id' => rand(1, 5)
        ];
    }
}
