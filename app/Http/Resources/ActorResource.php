<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {   

        // incluir solo un atributo en una respuesta de recurso si se cumple una condición determinada
       // 'secret' => $this->when(Auth::user()->isAdmin(), 'secret-value'),

        // El whenmétodo también acepta un cierre como segundo argumento, lo que le permite calcular el valor resultante solo si la condición dada es true:
        // 'secret' => $this->when(Auth::user()->isAdmin(), function () {
        //     return 'secret-value';
        // }),

        // puede tener varios atributos que solo deben incluirse en la respuesta del recurso en función de la misma condición.
        // $this->mergeWhen(Auth::user()->isAdmin(), [
        //     'first-secret' => 'value',
        //     'second-secret' => 'value',
        // ]),


        // Incluir relaciones de forma condicional en sus respuestas de recursos en función de si la relación ya se ha cargado en el modelo. 
        // 'posts' => PostResource::collection($this->whenLoaded('posts')),

        // puede incluir condicionalmente datos de las tablas intermedias de relaciones de muchos a muchos utilizando el whenPivotLoadedmétodo. 
        // 'expires_at' => $this->whenPivotLoaded('role_user', function () {
        //     return $this->pivot->expires_at;
        // }),

        // Si su tabla intermedia usa un descriptor de acceso diferente a pivot, puede usar el whenPivotLoadedAsmétodo:
        // 'expires_at' => $this->whenPivotLoadedAs('subscription', 'role_user', function () {
        //     return $this->subscription->expires_at;
        // }),


        return [
            'type' => 'actors',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'name' => $this->resource->name,
                'slug' => $this->resource->slug,
                'birth_date' => $this->resource->birth_date,
            ],
            'links' => [
                'self' => url('/api/auth/actors/'.$this->resource->getRouteKey())
            ],
            'included' => $this->when(request('include') == 'movies',   $this->resource->movies ),
                          $this->when(request('include') == 'episodes', $this->resource->episodes ),
            // 'posts' => PostResource::collection($this->posts),
        ];
    }
}
