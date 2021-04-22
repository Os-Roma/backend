<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorRequest;
use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index(Request $request)
    {
        $directors = Director::with(['movies', 'episodes'])->orderBy('name', 'ASC')->paginate(50);   
        return $directors;
    }

    public function store(StoreDirectorRequest $request)
    {
        $director = Director::create($request->all());
        return $director;
    }

    public function show(Director $director)
    {
        return $director;
    }

    public function update(Request $request, Director $director)
    {
        $director = Director::find($id);
        $director->update($request->all());
        return $director;
    }

    public function destroy(Director $director)
    {
        $director->delete();
        return response()->json([
            'deleted' => true
        ], 200);
    }
}
