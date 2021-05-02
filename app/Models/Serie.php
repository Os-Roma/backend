<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Traits\{HasSorts, HasFields};
use App\Models\Builders\SerieBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory, HasSlug, HasSorts, HasFields;

    protected $table = 'series';
    protected $fillable = [ 'title', 'overview', 'release_date', 'genre_id', 'classification_id' ];
    public $allowedSorts = [ 'title', 'overview', 'release_date', 'created_at', 'updated_at' ];

    public function newEloquentBuilder($query)
    {
        return new SerieBuilder($query);
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

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
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
