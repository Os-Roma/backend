<?php

namespace App\Http\Resources\Serie;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Classification\ClassificationResource;
use App\Http\Resources\Genre\GenreResource;
use App\Http\Resources\Episode\EpisodeResource;
use App\Http\Resources\Season\SeasonResource;

class SerieResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'type' => 'series',
            'id' => (string) $this->getRouteKey(),
            'attributes' => [
                'slug' => $this->slug,
                'title' => $this->title,
                'overview' => $this->overview,
                'release_date' => $this->release_date,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'links' => [
                'self' => url('/api/auth/series/'.$this->getRouteKey())
            ],
            'included' => [
                'classification' => $this->when(strstr(request('include'), 'classification'), 
                            ClassificationResource::make($this->classification)),
                'genre' => $this->when(strstr(request('include'), 'genre'), 
                            GenreResource::make($this->genre)),
                'episodes' => $this->when(strstr(request('include'), 'episodes'), 
                            EpisodeResource::collection($this->episodes)),
                'seasons' => $this->when(strstr(request('include'), 'seasons'), 
                            SeasonResource::collection($this->seasons)),
            ]
        ];
    }
}
