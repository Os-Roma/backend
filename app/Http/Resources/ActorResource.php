<?php

namespace App\Http\Resources\Actor;

use Illuminate\Http\Resources\Json\JsonResource;

class ActorResource extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'type' => 'actors',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'name' => $this->resource->name,
                'slug' => $this->resource->slug,
                'birth_date' => $this->resource->birth_date,
                'created_at' => $this->resource->created_at,
                'updated_at' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => url('/api/auth/actors/'.$this->resource->getRouteKey())
            ],
            'included' => $this->when(strstr(request('include'), 'movies'), $this->resource->movies ),
                        $this->when(strstr(request('include'), 'episodes'), $this->resource->episodes ),
        ];
    }
}
