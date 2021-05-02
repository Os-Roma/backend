<?php

namespace App\Http\Resources\Season;

use Iluminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SeasonCollection extends ResourceCollection
{
    public $collects = SeasonResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => url('/api/auth/seasons')
            ],
            'meta' => [
                'seasons_count' => $this->collection->count()
            ],
            'jsonapi' => [
                'version' => "1.0"
            ]
        ];
    }
}
