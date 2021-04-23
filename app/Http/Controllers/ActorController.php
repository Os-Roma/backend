<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorRequest;
use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{   
    public function index(Request $request)
    {
        $actors = Actor::with(['movies', 'episodes'])->Search($request->name)->orderBy('name', 'ASC')->paginate(20);   
        return response()->json(['actors' => $actors], 200);
    }

    public function store(StoreActorRequest $request)
    {   
        $actor = Actor::create($request->all());
        return response()->json(['actor' => $actor], 201);
    }

    public function show(Actor $actor)
    {
        return response()->json(['actor' => $actor], 200);
    }

    public function update(StoreActorRequest $request, Actor $actor)
    {
        $actor->update($request->all());
        return response()->json(['actor' => $actor], 200);
    }

    public function destroy(Actor $actor)
    { 
        $actor->delete();
        return response()->json(['deleted' => true], 200);
    }
}

