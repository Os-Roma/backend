<?php

namespace App\Http\Controllers;

use App\Http\Resources\{ActorResource, ActorCollection};
use App\Http\Requests\{StoreActorRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{   
    public function index(PaginateRequest $request)
    {   
        $actors = Actor::fields(request('fields'))->search(request('search'))->sort(request('sort'))->paginate(request('per_page'));
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

