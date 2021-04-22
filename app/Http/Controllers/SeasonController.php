<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeassonRequest;
use Illuminate\Http\Request;
use App\Models\Seasson;

class SeassonController extends Controller
{   

    public function index(Request $request)
    {
        $seassons = Seasson::with(['serie', 'episodes'])->orderBy('release_date', 'DESC')->paginate(30);   

        return $seassons;
    }

    public function store(StoreSeassonRequest $request)
    {
        $seasson = Seasson::create($request->all());
        return $seasson;
    }

    public function show(Seasson $seasson)
    {
        return $seasson;
    }

    public function update(Request $request, Seasson $seasson)
    {
        $seasson = Seasson::find($id);
        $seasson->update($request->all());
        return $seasson;
    }

    public function destroy(Seasson $seasson)
    { 
        $seasson->delete();
        return response()->json([
            'deleted' => true
        ], 200);
    }
}
