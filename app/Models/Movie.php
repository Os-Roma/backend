<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Traits\{HasSorts, HasFields};
use App\Models\Builders\MovieBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory, HasSlug, HasSorts, HasFields;

    protected $table = 'movies';
    protected $fillable = [ 'title', 'overview', 'release_date', 'director_id', 'genre_id', 'classification_id' ];
    public $allowedSorts = [ 'title', 'overview', 'release_date', 'created_at', 'updated_at' ];

    public function newEloquentBuilder($query)
    {
        return new MovieBuilder($query);
    }

    public function getSlugOptions() : SlugOptions // Get the options for generating the slug.
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * @return string
     */
    public function getRouteKeyName() // Get the route key for the model.
    {
        return 'slug';
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function actors()
    {
        return $this->morphToMany(Actor::class, 'actorable');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
