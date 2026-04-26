<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $favourites = Favourite::where('user_id', auth()->id())->get();
        $reviews = Review::where('user_id', auth()->id())->get();

        if (auth()->user()->role === 'owner') {
            $ownedPlaces = Place::where('created_by', auth()->id())->get();
            $totalFavouritesCount = Favourite::whereIn('place_id', $ownedPlaces->pluck('id'))->count();
        }

        return view('home', ['favourites' => $favourites, 'reviews' => $reviews, 'ownedPlaces' => $ownedPlaces ?? null, 'totalFavouritesCount' => $totalFavouritesCount ?? null]);
    }
}
