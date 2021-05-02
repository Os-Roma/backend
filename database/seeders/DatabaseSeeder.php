<?php

namespace Database\Seeders;

use App\Models\{User, Genre, Classification, Actor, Director, Movie, Serie, Season, Episode};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ]);

        Genre::factory(5)->create();
        Classification::factory(5)->create();
        Actor::factory()->count(50)->create();
        Director::factory(20)->create();
        Movie::factory(30)->create()->each(function ($movie) {
            $movie->actors(['actorable_id' => rand(30, 50)])->attach($this->array(rand(1, 50)));
        });
        Serie::factory(10)->create();
        Season::factory(20)->create();
        Episode::factory(200)->create()->each(function ($episode) {
            $episode->actors(['actorable_id' => rand(15, 30)])->attach($this->array(rand(1, 50)));
        });
    }

    public function array($max){
        $values = [];

        for ( $i=1; $i < $max; $i++ ){
            $values[] = $i;
        }
        return $values;
    }
}
