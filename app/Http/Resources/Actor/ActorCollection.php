<?php

namespace App\Http\Resources\Actor;

use Iluminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActorCollection extends ResourceCollection
{
    public $collects = ActorResource::class;
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
                'self' => url('/api/auth/actors')
            ],
            'meta' => [
                'actors_count' => $this->collection->count()
            ],
            'jsonapi' => [
                'version' => "1.0"
            ]
        ];
    }
}
