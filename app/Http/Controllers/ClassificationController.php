<?php

namespace App\Http\Controllers;

use App\Http\Resources\Classification\{ClassificationResource, ClassificationCollection};
use App\Http\Requests\{StoreClassificationRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{   
    public function index(PaginateRequest $request)
    {
        $classifications = Classification::fields(request('fields'))
                        ->name(request('name'))
                        ->description(request('description'))
                        ->sort(request('sort'))
                        ->paginate(request('per_page'));

        return ClassificationCollection::make($classifications);
    }

    public function store(StoreClassificationRequest $request)
    {
        $classification = Classification::create($request->all());
        return ClassificationResource::make($classification);
    }

    public function show(Classification $classification)
    {
        return ClassificationResource::make($classification);
    }

    public function update(StoreClassificationRequest $request, Classification $classification)
    {   
        $classification->update($request->all());
        return ClassificationResource::make($classification);
    }

    public function destroy(Classification $classification)
    { 
        $classification->delete();
        return response()->json(['deleted' => true], 200);
    }
}