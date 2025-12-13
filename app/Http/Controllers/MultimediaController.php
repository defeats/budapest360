<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use App\Http\Requests\StoreMultimediaRequest;
use App\Http\Requests\UpdateMultimediaRequest;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multimedia = Multimedia::with(['user', 'place'])->get();
        return view('multimedia.index', ['multimedia' => $multimedia]); //TODO, multimedia.index is a wrong view to be returned
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('multimedia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMultimediaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Multimedia $multimedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Multimedia $multimedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMultimediaRequest $request, Multimedia $multimedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Multimedia $multimedia)
    {
        //
    }
}
