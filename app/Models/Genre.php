<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Traits\{HasSorts, HasFields};
use App\Models\Builders\GenreBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory, HasSlug, HasSorts, HasFields;

    protected $table = 'genres';
    protected $fillable = [ 'name', 'description' ];
    public $allowedSorts = [ 'name', 'description', 'created_at', 'updated_at' ];

    public function newEloquentBuilder($query)
    {
        return new GenreBuilder($query);
    }

    public function getSlugOptions() : SlugOptions // Get the options for generating the slug.
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * @return string
     */
    public function getRouteKeyName() // Get the route key for the model.
    {
        return 'slug';
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
