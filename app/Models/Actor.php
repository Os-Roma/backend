<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Traits\{HasSorts, HasFields};
use App\Models\Builders\ActorBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory, HasSlug, HasSorts, HasFields;


    protected     $table = 'actors';
    protected  $fillable = [ 'name', 'birth_date' ];
    public $allowedSorts = [ 'name', 'birth_date', 'created_at', 'updated_at' ];

    public function newEloquentBuilder($query)
    {
        return new ActorBuilder($query);
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
        return $this->morphedByMany(Movie::class, 'actorable', 'actorables');
    }

    public function episodes()
    {
        return $this->morphedByMany(Episode::class, 'actorable', 'actorables');
    }

}
