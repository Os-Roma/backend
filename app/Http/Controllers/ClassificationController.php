<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassificationRequest;
use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{   
    public function index(Request $request)
    {
        $classifications = Classification::with(['series', 'movies'])->Search($request->name)->orderBy('name', 'ASC')->get();
        return response()->json(['classifications' => $classifications], 200);
    }

    public function store(StoreClassificationRequest $request)
    {
        $classification = Classification::create($request->all());
        return response()->json(['classification' => $classification], 201);
    }

    public function show(Classification $classification)
    {
        return response()->json(['classification' => $classification], 200);
    }

    public function update(StoreClassificationRequest $request, Classification $classification)
    {   
        $classification->update($request->all());
        return response()->json(['classification' => $classification], 200);
    }

    public function destroy(Classification $classification)
    { 
        $classification->delete();
        return response()->json(['deleted' => true], 200);
    }
}