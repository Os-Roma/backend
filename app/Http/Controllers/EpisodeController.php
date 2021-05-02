<?php

namespace App\Http\Controllers;

use App\Http\Resources\Episode\{EpisodeResource, EpisodeCollection};
use App\Http\Requests\{StoreEpisodeRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function index(PaginateRequest $request)
    {
        $episodes = Episode::fields(request('fields'))
                        ->title(request('title'))
                        ->overview(request('overview'))
                        ->release_date(request('release_date'))
                        ->sort(request('sort'))
                        ->paginate(request('per_page'));

        return EpisodeCollection::make($episodes);
    }

    public function store(StoreEpisodeRequest $request)
    {
        $episode = Episode::create($request->all());
        return EpisodeResource::make($episode);
    }

    public function show(Episode $episode)
    {
        return EpisodeResource::make($episode);
    }

    public function update(StoreEpisodeRequest $request, Episode $episode)
    {
        $episode->update($request->all());
        return EpisodeResource::make($episode);
    }

    public function destroy(Episode $episode)
    {
        $episode->delete();
        return response()->json(['deleted' => true], 200);
    }
}
