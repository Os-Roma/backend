<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'series';
    protected $fillable = [ 'title', 'overview', 'release_date', 'gender_id', 'classification_id' ];

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

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function scopeSearch($query, $title)
    {
        if (trim($title) != "") {
            return $query->where('title', 'LIKE', "%$title%");
        }
    }
}
