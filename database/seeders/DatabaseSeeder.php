<?php

namespace Database\Seeders;

use App\Models\{Gender, Classification, Actor, Director, Movie, Serie, Season, Episode};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'slug' => 'administrator',
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ]);

        Gender::factory(5)->create();
        Classification::factory(5)->create();
        Actor::factory()->count(50)->create();
        Director::factory(20)->create();
        Movie::factory(30)->create()->each(function ($movie) {
            $movie->actors(['actorable_id' => rand(1, 10)])->attach($this->array(rand(1, 50)));
        });
        Serie::factory(10)->create();
        Season::factory(20)->create();
        Episode::factory(200)->create()->each(function ($episode) {
            $episode->actors()->attach($this->array(rand(1, 50)));
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
