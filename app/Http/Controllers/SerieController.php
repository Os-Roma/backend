<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{   
    public function index(Request $request)
    {
        $series = Serie::with([ 'seasons', 'episodes.actors', 'episodes.director', 'classification', 'gender'])->Search($request->title)->orderBy('release_date', 'DESC')->paginate(30);  
        return response()->json(['series' => $series], 200);
    }

    public function store(StoreSerieRequest $request)
    {
        $serie = Serie::create($request->all());
        return response()->json(['serie' => $serie], 201);
    }

    public function show(Serie $serie)
    {
        return response()->json(['serie' => $serie], 200);
    }

    public function update(StoreSerieRequest $request, Serie $serie)
    {
        $serie->update($request->all());
        return response()->json(['serie' => $serie], 200);
    }

    public function destroy(Serie $serie)
    { 
        return response()->json(['deleted' => true], 200);
    }
}
