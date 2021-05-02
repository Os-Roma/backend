<?php

namespace App\Http\Resources\Episode;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Actor\ActorResource;
use App\Http\Resources\Director\DirectorResource;
use App\Http\Resources\Season\SeasonResource;

class EpisodeResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'type' => 'episodes',
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
                'self' => url('/api/auth/episodes/'.$this->getRouteKey())
            ],
            'included' => [
                'season' => $this->when(strstr(request('include'), 'season'), 
                            SeasonResource::make($this->season)),
                'director' => $this->when(strstr(request('include'), 'director'), 
                            DirectorResource::make($this->director)),
                'actors' => $this->when(strstr(request('include'), 'actors'), 
                            ActorResource::collection($this->actors)),
            ]
        ];
    }
}
