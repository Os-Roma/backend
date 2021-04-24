<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeasonRequest;
use Illuminate\Http\Request;
use App\Models\Season;

class SeasonController extends Controller
{   
    public function index(Request $request)
    {
        $seasons = Season::with(['serie', 'episodes.director'])->Search($request->title)->orderBy('release_date', 'DESC')->paginate(30);   
        return response()->json(['seasons' => $seasons], 200);
    }

    public function store(StoreSeasonRequest $request)
    {
        $season = Season::create($request->all());
        return response()->json(['season' => $season], 201);
    }

    public function show(Season $season)
    {
        return response()->json(['season' => $season], 200);
    }

    public function update(StoreSeasonRequest $request, Season $season)
    {
        $season->update($request->all());
        return response()->json(['season' => $season], 200);
    }

    public function destroy(Season $season)
    { 
        $seasson->delete();
        return response()->json(['deleted' => true], 200);
    }
}
