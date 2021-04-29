<?php

namespace App\Http\Resources;

use Iluminate\Http\Request;
// use App\Http\Resources\ActorResource;
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
                'self' => url('/api/auth/actors/')
            ],
            'meta' => [
                'actors_count' => $this->collection->count()
            ]
        ];
    }
}
