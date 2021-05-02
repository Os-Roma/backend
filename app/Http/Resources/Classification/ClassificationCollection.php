<?php

namespace App\Http\Resources\Classification;

use Iluminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassificationCollection extends ResourceCollection
{
    public $collects = ClassificationResource::class;
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
                'self' => url('/api/auth/classifications')
            ],
            'meta' => [
                'classifications_count' => $this->collection->count()
            ],
            'jsonapi' => [
                'version' => "1.0"
            ]
        ];
    }
}
