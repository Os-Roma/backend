<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Traits\{HasSorts, HasFields};
use App\Models\Builders\SeasonBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory, HasSlug, HasSorts, HasFields;

    protected $table = 'seasons';
    protected $fillable = [ 'title', 'overview', 'release_date', 'serie_id' ];
    public $allowedSorts = [ 'title', 'overview', 'release_date', 'created_at', 'updated_at' ];

    public function newEloquentBuilder($query)
    {
        return new SeasonBuilder($query);
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

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
