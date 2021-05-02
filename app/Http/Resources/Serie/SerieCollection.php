<?php

namespace App\Http\Resources\Serie;

use Iluminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SerieCollection extends ResourceCollection
{
    public $collects = SerieResource::class;
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
                'self' => url('/api/auth/series')
            ],
            'meta' => [
                'series_count' => $this->collection->count()
            ],
            'jsonapi' => [
                'version' => "1.0"
            ]
        ];
    }
}
