<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorRequest;
use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index(Request $request)
    {
        $directors = Director::with(['movies', 'episodes'])->Search($request->name)->orderBy('name', 'ASC')->get();   
        return response()->json(['directors' => $directors], 200);
    }

    public function store(StoreDirectorRequest $request)
    {
        $director = Director::create($request->all());
        return response()->json(['director' => $director], 201);
    }

    public function show(Director $director)
    {
        return response()->json(['director' => $director], 200);
    }

    public function update(StoreDirectorRequest $request, Director $director)
    {
        $director->update($request->all());
        return response()->json(['director' => $director], 200);
    }

    public function destroy(Director $director)
    {
        $director->delete();
        return response()->json(['deleted' => true], 200);
    }
}
