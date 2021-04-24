<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEpisodeRequest;
use Illuminate\Http\Request;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function index(Request $request)
    {
        $episodes = Episode::with(['season.serie', 'director', 'actors'])->Search($request->title)->orderBy('release_date', 'DESC')->get();   
        return response()->json(['episodes' => $episodes], 200);
    }

    public function store(StoreEpisodeRequest $request)
    {
        $episode = Episode::create($request->all());
        return response()->json(['episode' => $episode], 201);
    }

    public function show(Episode $episode)
    {
        return response()->json(['episode' => $episode], 200);
    }

    public function update(StoreEpisodeRequest $request, Episode $episode)
    {
        $episode->update($request->all());
        return response()->json(['episode' => $episode], 200);
    }

    public function destroy(Episode $episode)
    {
        $episode->delete();
        return response()->json(['deleted' => true], 200);
    }
}
