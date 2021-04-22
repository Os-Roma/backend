<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{   

    public function index(Request $request)
    {
        $series = Serie::with(['actors', 'directors', 'classification', 'gender'])->orderBy('release_date', 'DESC')->paginate(30);   

        return $series;
    }

    public function store(StoreSerieRequest $request)
    {
        $serie = Serie::create($request->all());
        return $serie;
    }

    public function show(Serie $serie)
    {
        return $serie;
    }

    public function update(Request $request, Serie $serie)
    {
        $serie = Serie::find($id);
        $serie->update($request->all());
        return $serie;
    }

    public function destroy(Serie $serie)
    { 
        $serie->delete();
        return response()->json([
            'deleted' => true
        ], 200);
    }
}
