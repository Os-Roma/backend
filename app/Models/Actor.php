<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'actors';
    protected $fillable = [ 'name', 'birth_date' ];

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
        return $this->morphedByMany(Movie::class, 'actorable', 'actorables');
    }

    public function episodes()
    {
        return $this->morphedByMany(Movie::class, 'actorable', 'actorables');
    }

    public function scopeSearch($query, $name)
    {
        if (trim($name) != "") {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }
}
