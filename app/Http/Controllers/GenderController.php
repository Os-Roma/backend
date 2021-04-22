<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenderRequest;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{   

    public function index(Request $request)
    {
        $genders = Gender::with(['series', 'movies'])->orderBy('name', 'ASC')->paginate(30);   

        return $genders;
    }

    public function store(StoreGenderRequest $request)
    {
        $gender = Gender::create($request->all());
        return $gender;
    }

    public function show(Gender $gender)
    {
        return $gender;
    }

    public function update(Request $request, Gender $gender)
    {
        $gender = Gender::find($id);
        $gender->update($request->all());
        return $gender;
    }

    public function destroy(Gender $gender)
    { 
        $gender->delete();
        return response()->json([
            'deleted' => true
        ], 200);
    }
}