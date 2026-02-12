<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::with(['category'/*, 'coverImage'*/])->get(); /*TODO: multimedia (kepek, coverek) optimalizalasa*/
        
        return view('places.index', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request, $slug)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $place = Place::where('slug', $slug)
            ->with(['multimedia', 'category', 'reviews.user']) /*velemenyek mellett a usert is betoltjuk*/ /*TODO: Reviewt megcsinalni es optimalizalni*/
            ->firstOrFail();

        return view('places.show', ['place' => $place]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
