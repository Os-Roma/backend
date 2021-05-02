<?php

namespace App\Http\Resources\Season;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Serie\SerieResource;
use App\Http\Resources\Episode\EpisodeResource;

class SeasonResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'type' => 'season',
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
                'self' => url('/api/auth/season/'.$this->getRouteKey())
            ],
            'included' => [
                'serie' => $this->when(strstr(request('include'), 'serie'), 
                            SerieResource::make($this->serie)),
                'episodes' => $this->when(strstr(request('include'), 'episodes'), 
                            EpisodeResource::collection($this->episodes)),
            ]
        ];
    }
}
