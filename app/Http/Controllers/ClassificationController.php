<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassificationRequest;
use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{   

    public function index(Request $request)
    {
        $classifications = Classification::with(['series', 'movies'])->orderBy('name', 'ASC')->paginate(30);   

        return $classifications;
    }

    public function store(StoreClassificationRequest $request)
    {
        $classification = Classification::create($request->all());
        return $classification;
    }

    public function show(Classification $classification)
    {
        return $classification;
    }

    public function update(Request $request, Classification $classification)
    {
        $classification = Classification::find($id);
        $classification->update($request->all());
        return $classification;
    }

    public function destroy(Classification $classification)
    { 
        $classification->delete();
        return response()->json([
            'deleted' => true
        ], 200);
    }
}