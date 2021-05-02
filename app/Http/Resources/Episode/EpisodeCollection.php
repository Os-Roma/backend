<?php

namespace App\Http\Resources\Episode;

use Iluminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EpisodeCollection extends ResourceCollection
{
    public $collects = EpisodeResource::class;
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
                'self' => url('/api/auth/episodes')
            ],
            'meta' => [
                'episodes_count' => $this->collection->count()
            ],
            'jsonapi' => [
                'version' => "1.0"
            ]
        ];
    }
}
