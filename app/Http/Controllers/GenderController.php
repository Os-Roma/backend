<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenderRequest;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{   
    public function index(Request $request)
    {
        $genders = Gender::with(['series', 'movies'])->Search($request->name)->orderBy('name', 'ASC')->paginate(30);   
        return response()->json(['genders' => $genders], 200);
    }

    public function store(StoreGenderRequest $request)
    {
        $gender = Gender::create($request->all());
        return response()->json(['gender' => $gender], 201);
    }

    public function show(Gender $gender)
    {
        return response()->json(['gender' => $gender], 200);
    }

    public function update(StoreGenderRequest $request, Gender $gender)
    {
        $gender->update($request->all());
        return response()->json(['gender' => $gender], 200);
    }

    public function destroy(Gender $gender)
    { 
        $gender->delete();
        return response()->json(['deleted' => true], 200);
    }
}