<?php

namespace App\Http\Controllers;

use App\Http\Resources\Genre\{GenreResource, GenreCollection};
use App\Http\Requests\{StoreGenreRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{   
    public function index(PaginateRequest $request)
    {
        $genres = Genre::fields(request('fields'))
                        ->name(request('name'))
                        ->description(request('description'))
                        ->sort(request('sort'))
                        ->paginate(request('per_page'));

        return GenreCollection::make($genres);
    }

    public function store(StoreGenreRequest $request)
    {
        $genre = Genre::create($request->all());
        return GenreResource::make($genre);
    }

    public function show(Genre $genre)
    {
        return GenreResource::make($genre);
    }

    public function update(StoreGenreRequest $request, Genre $genre)
    {
        $genre->update($request->all());
        return GenreResource::make($genre);
    }

    public function destroy(Genre $genre)
    { 
        $genre->delete();
        return response()->json(['deleted' => true], 200);
    }
}