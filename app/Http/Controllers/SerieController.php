<?php

namespace App\Http\Controllers;

use App\Http\Resources\Serie\{SerieResource, SerieCollection};
use App\Http\Requests\{StoreSerieRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{   
    public function index(PaginateRequest $request)
    {
        $series = Serie::fields(request('fields'))
                        ->title(request('title'))
                        ->overview(request('overview'))
                        ->release_date(request('release_date'))
                        ->sort(request('sort'))
                        ->paginate(request('per_page'));

        return SerieCollection::make($series);
    }

    public function store(StoreSerieRequest $request)
    {
        $serie = Serie::create($request->all());
        return SerieResource::make($serie);
    }

    public function show(Serie $series)
    {
        return SerieResource::make($series);
    }

    public function update(StoreSerieRequest $request, Serie $series)
    {
        $series->update($request->all());
        return SerieResource::make($series);
    }

    public function destroy(Serie $series)
    {   
        $series->delete();
        return response()->json(['deleted' => true], 200);
    }
}
