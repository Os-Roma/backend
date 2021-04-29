<?php

namespace App\Http\Controllers;

use App\Http\Resources\{ActorResource, ActorCollection};
use App\Http\Requests\StoreActorRequest;
use Illuminate\Http\Request;
use App\Models\Actor;
use Illuminate\Support\Str;

class ActorController extends Controller
{   
    public function index(Request $request)
    {
        $direction = 'asc';
        $sortField = request('sort');

        if (Str::of($sortField)->startsWith('-')) {
            $direction = 'desc';
            $sortField = Str::of($sortField)->substr(1);
        }
 
        $actors = Actor::with(['movies', 'episodes'])->Search($request->name)->orderBy('name', 'ASC')->get();   
        return ActorCollection::make($actors);
    }

    public function store(StoreActorRequest $request)
    {   
        $actor = Actor::create($request->all());
        return ActorResource::make($actor);
    }

    public function show(Actor $actor)
    {
        return ActorResource::make($actor);
    }

    public function update(StoreActorRequest $request, Actor $actor)
    {
        $actor->update($request->all());
        return ActorResource::make($actor);
    }

    public function destroy(Actor $actor)
    { 
        $actor->delete();
        return response()->json(['deleted' => true], 200);
    }
}

