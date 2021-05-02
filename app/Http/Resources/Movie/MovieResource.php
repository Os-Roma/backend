<?php

namespace App\Http\Resources\Movie;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Classification\ClassificationResource;
use App\Http\Resources\Director\DirectorResource;
use App\Http\Resources\Actor\ActorResource;
use App\Http\Resources\Genre\GenreResource;

class MovieResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'type' => 'movies',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'slug' => $this->resource->slug,
                'title' => $this->resource->title,
                'overview' => $this->resource->overview,
                'release_date' => $this->resource->release_date,
                'created_at' => $this->resource->created_at,
                'updated_at' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => url('/api/auth/movies/'.$this->resource->getRouteKey())
            ],
            'included' => [
                'classification' => $this->when(strstr(request('include'), 'classification'), 
                            ClassificationResource::make($this->classification)),
                'genre' => $this->when(strstr(request('include'), 'genre'), 
                            GenreResource::make($this->genre)),
                'director' => $this->when(strstr(request('include'), 'director'), 
                            DirectorResource::make($this->director)),
                'actors' => $this->when(strstr(request('include'), 'actors'), 
                            ActorResource::collection($this->actors)),
            ]
        ];
    }
}
