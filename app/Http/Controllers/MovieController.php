<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{   

    public function index(Request $request)
    {
        $movies = Movie::with(['actors', 'directors', 'classification', 'gender'])->orderBy('release_date', 'DESC')->paginate(30);   

        return $movies;
    }

    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create($request->all());
        return $movie;
    }

    public function show(Movie $movie)
    {
        return $movie;
    }

    public function update(Request $request, Movie $movie)
    {
        $movie = Movie::find($id);
        $movie->update($request->all());
        return $movie;
    }

    public function destroy(Movie $Movie)
    { 
        $movie->delete();
        return response()->json([
            'deleted' => true
        ], 200);
    }
}
