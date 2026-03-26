<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Http\Requests\StoreFavouriteRequest;
use App\Http\Requests\UpdateFavouriteRequest;
use App\Models\Place;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Favourite::class);
        $favourites = Favourite::with('place')->where('user_id', auth()->id())->get();

        return view('favourites.index', ['favourites' => $favourites]);
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
    public function store(StoreFavouriteRequest $request)
    {
        $this->authorize('create', Favourite::class);
        $userId = auth()->id();
        $placeId = $request->place_id;

        $favourite = Favourite::where('user_id', $userId)
            ->where('place_id', $placeId)
            ->first();

        if ($favourite) {
            $favourite->delete();
            return redirect()->back()->with('success', 'Eltávolítva a kedvencek közül.');
        }

        Favourite::create([
            'user_id' => $userId,
            'place_id' => $placeId,
        ]);

        return redirect()->back()->with('success', 'Hozzáadva a kedvencekhez!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavouriteRequest $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favourite $favourite)
    {
        //
    }
}
