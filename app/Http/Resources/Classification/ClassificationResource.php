<?php

namespace App\Http\Resources\Classification;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Serie\SerieResource;
use App\Http\Resources\Movie\MovieResource;

class ClassificationResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'type' => 'classifications',
            'id' => (string) $this->getRouteKey(),
            'attributes' => [
                'slug' => $this->slug,
                'name' => $this->name,
                'description' => $this->description,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'links' => [
                'self' => url('/api/auth/classifications/'.$this->getRouteKey())
            ],
            'included' => [
                'movies' => $this->when(strstr(request('include'), 'movies'), 
                            MovieResource::collection($this->movies)),
                'series' => $this->when(strstr(request('include'), 'series'), 
                            SerieResource::collection($this->series)),
            ]
        ];
    }
}
