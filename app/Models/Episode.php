<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'episodes';
    protected $fillable = [ 'title', 'overview', 'release_date', 'season_id', 'director_id' ];

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

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function actors()
    {
        return $this->morphToMany(Actor::class, 'actorable');
    }

    public function scopeSearch($query, $title)
    {
        if (trim($title) != "") {
            return $query->where('title', 'LIKE', "%$title%");
        }
    }
}
