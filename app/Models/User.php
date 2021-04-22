<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasSlug;

    // Rest omitted for brevity
    /**
     * @return mixed */

    public function getJWTIdentifier() // Get the identifier that will be stored in the subject claim of the JWT.
    {
        return $this->getKey();
    }

    /**
     * @return array */

    public function getJWTCustomClaims() // Return a key value array, containing any custom claims to be added to the JWT.
    {
        return [];
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

    /**
     * @var array */

    protected $fillable = [ 'name', 'email', 'password' ]; // The attributes that are mass assignable.

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token' ];

    /**
     * @var array */

    protected $casts = [ 'email_verified_at' => 'datetime' ]; // The attributes that should be cast to native types.
}
