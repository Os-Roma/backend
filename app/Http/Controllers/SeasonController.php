<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeassonRequest;
use Illuminate\Http\Request;
use App\Models\Seasson;

class SeassonController extends Controller
{   
    public function index(Request $request)
    {
        $seassons = Seasson::with(['serie', 'episodes'])->Search($request->title)->orderBy('release_date', 'DESC')->paginate(30);   
        return response()->json(['seassons' => $seassons], 200);
    }

    public function store(StoreSeassonRequest $request)
    {
        $seasson = Seasson::create($request->all());
        return response()->json(['seasson' => $seasson], 201);
    }

    public function show(Seasson $seasson)
    {
        return response()->json(['seasson' => $seasson], 200);
    }

    public function update(StoreSeassonRequest $request, Seasson $seasson)
    {
        $seasson->update($request->all());
        return response()->json(['seasson' => $seasson], 200);
    }

    public function destroy(Seasson $seasson)
    { 
        $seasson->delete();
        return response()->json(['deleted' => true], 200);
    }
}
