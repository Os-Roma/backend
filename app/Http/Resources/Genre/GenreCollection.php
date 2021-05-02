<?php

namespace App\Http\Resources\Genre;

use Iluminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GenreCollection extends ResourceCollection
{
    public $collects = GenreResource::class;
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
                'self' => url('/api/auth/genres')
            ],
            'meta' => [
                'genres_count' => $this->collection->count()
            ],
            'jsonapi' => [
                'version' => "1.0"
            ]
        ];
    }
}
