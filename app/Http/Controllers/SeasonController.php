<?php

namespace App\Http\Controllers;

use App\Http\Resources\Season\{SeasonResource, SeasonCollection};
use App\Http\Requests\{StoreSeasonRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Season;

class SeasonController extends Controller
{   
    public function index(PaginateRequest $request)
    {
        $seasons = Season::fields(request('fields'))
                        ->title(request('title'))
                        ->overview(request('overview'))
                        ->release_date(request('release_date'))
                        ->sort(request('sort'))
                        ->paginate(request('per_page'));

        return SeasonCollection::make($seasons);
    }

    public function store(StoreSeasonRequest $request)
    {
        $season = Season::create($request->all());
        return SeasonResource::make($season);
    }

    public function show(Season $season)
    {
        return SeasonResource::make($season);
    }

    public function update(StoreSeasonRequest $request, Season $season)
    {
        $season->update($request->all());
        return SeasonResource::make($season);
    }

    public function destroy(Season $season)
    { 
        $seasson->delete();
        return response()->json(['deleted' => true], 200);
    }
}
