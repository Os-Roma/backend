<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorRequest;
use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{   

    public function index(Request $request)
    {
        $actors = Actor::with(['movies', 'episodes'])->orderBy('name', 'ASC')->paginate(50);   
        return $actors;
    }

    public function store(StoreActorRequest $request)
    {
        $actor = Actor::create($request->all());
        return $actor;
    }

    public function show(Actor $actor)
    {
        return $actor;
    }

    public function update(Request $request, Actor $actor)
    {
        $actor = Actor::find($id);
        $actor->update($request->all());
        return $actor;
    }

    public function destroy(Actor $actor)
    { 
        $actor->delete();
        return response()->json([
            'deleted' => true
        ], 200);
    }
}
