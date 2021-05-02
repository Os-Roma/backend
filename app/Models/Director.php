<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Traits\{HasSorts, HasFields};
use App\Models\Builders\DirectorBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory, HasSlug, HasSorts, HasFields;

    protected $table = 'directors';
    protected $fillable = [ 'name', 'birth_date' ];
    public $allowedSorts = [ 'name', 'birth_date', 'created_at', 'updated_at' ];

    public function newEloquentBuilder($query)
    {
        return new DirectorBuilder($query);
    }

    public function getSlugOptions() : SlugOptions // Get the options for generating the slug.
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * @return string */

    public function getRouteKeyName() // Get the route key for the model.
    {
        return 'slug';
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
