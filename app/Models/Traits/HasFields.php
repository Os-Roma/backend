<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait HasFields
{
    public function scopeFields(Builder $query, $fields)
    {   
        if (! property_exists($this, 'allowedSorts')) 
            abort(500, 'Please set the public property $allowedSorts inside '.get_class($this));

        if(is_null($fields)) return;

        $selectFields = Str::of($fields)->explode(',');
        
        foreach ($selectFields as $field) {
            $query->addSelect($field);
        }

        if( ! collect($this->allowedSorts)->contains($field))
            abort(400, "Invalid Query Parameter, {$field} is not allowed.");
        
        $actors = $query->get();  
        // return $this->morphedByMany(Episode::class, 'actorable', 'actorables');
    }
}