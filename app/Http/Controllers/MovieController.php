<?php

namespace App\Http\Controllers;

use App\Http\Resources\Movie\{MovieResource, MovieCollection};
use App\Http\Requests\{StoreMovieRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{   
    public function index(PaginateRequest $request)
    {
        $movies = Movie::fields(request('fields'))
                        ->title(request('title'))
                        ->overview(request('overview'))
                        ->release_date(request('release_date'))
                        ->sort(request('sort'))
                        ->paginate(request('per_page'));

        return MovieCollection::make($movies);
    }

    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create($request->all());
        return MovieResource::make($movie);
    }

    public function show(Movie $movie)
    {
        return MovieResource::make($movie);
    }

    public function update(StoreMovieRequest $request, Movie $movie)
    {

        // dd($movie);
        $movie->update($request->all());
        return MovieResource::make($movie);
    }

    public function destroy(Movie $Movie)
    { 
        $movie->delete();
        return response()->json(['deleted' => true], 200);
    }
}
