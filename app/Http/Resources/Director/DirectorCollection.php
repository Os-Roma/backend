<?php

namespace App\Http\Resources\Director;

use Iluminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DirectorCollection extends ResourceCollection
{
    public $collects = DirectorResource::class;
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
                'self' => url('/api/auth/directors')
            ],
            'meta' => [
                'directors_count' => $this->collection->count()
            ],
            'jsonapi' => [
                'version' => "1.0"
            ]
        ];
    }
}
