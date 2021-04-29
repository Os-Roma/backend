<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{   
    public function index(Request $request)
    {
        $movies = Movie::with(['actors', 'director', 'classification'])->Search($request->title)->orderBy('release_date', 'DESC')->paginate(30);  
        return response()->json(['movies' => $movies], 200);
    }

    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create($request->all());
        return response()->json(['movie' => $movie], 201);
    }

    public function show(Movie $movie)
    {
        return response()->json(['movie' => $movie], 200);
    }

    public function update(StoreMovieRequest $request, Movie $movie)
    {

        // dd($movie);
        $movie->update($request->all());
        return response()->json(['movie' => $movie], 200);
    }

    public function destroy(Movie $Movie)
    { 
        $movie->delete();
        return response()->json(['deleted' => true], 200);
    }
}
