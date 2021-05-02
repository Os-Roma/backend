<?php

namespace App\Http\Controllers;

use App\Http\Resources\Director\{DirectorResource, DirectorCollection};
use App\Http\Requests\{StoreDirectorRequest, PaginateRequest};
use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index(PaginateRequest $request)
    {
        $directors = Director::fields(request('fields'))
                        ->name(request('name'))
                        ->birth_date(request('birth_date'))
                        ->movie(request('movie'))
                        ->episode(request('episode'))
                        ->sort(request('sort'))
                        ->paginate(request('per_page'));

        return DirectorCollection::make($directors);
    }

    public function store(StoreDirectorRequest $request)
    {
        $director = Director::create($request->all());
        return DirectorResource::make($director);
    }

    public function show(Director $director)
    {
        return DirectorResource::make($director);
    }

    public function update(StoreDirectorRequest $request, Director $director)
    {
        $director->update($request->all());
        return DirectorResource::make($director);
    }

    public function destroy(Director $director)
    {
        $director->delete();
        return response()->json(['deleted' => true], 200);
    }
}
