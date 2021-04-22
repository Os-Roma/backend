<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'movies';
    protected $fillable = [ 'title', 'overview', 'release_date' ];

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
        return $this->hasOne(Dircector::class);
    }

    public function actors()
    {
        return $this->morphToMany(Actor::class, 'actorable');
    }

    public function classification()
    {
        return $this->hasOne(Classification::class);
    }

    public function gender()
    {
        return $this->hasOne(Gender::class);
    }

    public function scopeSearch($query, $title)
    {
        if (trim($title) != "") {
            return $query->where('title', 'LIKE', "%$title%");
        }
    }
}
