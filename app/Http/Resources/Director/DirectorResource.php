<?php

namespace App\Http\Resources\Director;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Episode\EpisodeResource;
use App\Http\Resources\Movie\MovieResource;

class DirectorResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'type' => 'directors',
            'id' => (string) $this->getRouteKey(),
            'attributes' => [
                'slug' => $this->slug,
                'name' => $this->name,
                'birth_date' => $this->birth_date,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'links' => [
                'self' => url('/api/auth/directors/'.$this->getRouteKey())
            ],
            'included' => [
                'movies' => $this->when(strstr(request('include'), 'movies'), 
                    MovieResource::collection($this->movies)),
                'episodes' => $this->when(strstr(request('include'), 'episodes'), 
                    EpisodeResource::collection($this->episodes)),
            ]
        ];
    }
}
