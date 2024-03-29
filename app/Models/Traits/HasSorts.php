<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait HasSorts
{
	public function scopeSort(Builder $query, $sort)
    {
    	if (! property_exists($this, 'allowedSorts')) 
    		abort(500, 'Please set the public property $allowedSorts inside '.get_class($this));

        if(is_null($sort))
            // $sort = 'updated_at';
            return;

        $sortFields = Str::of($sort)->explode(',');
        
        foreach ($sortFields as $sortField) {
            $direction = 'asc';
            if (Str::of($sortField)->startsWith('-')) {
                $direction = 'desc';
                $sortField = Str::of($sortField)->substr(1);
            }
            $query->orderBy($sortField, $direction);
        }

        if( ! collect($this->allowedSorts)->contains($sortField))
            abort(400, "Invalid Query Parameter, {$sortField} is not allowed.");
    }
}