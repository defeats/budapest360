<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
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
        return view('home', ['favourites' => $favourites, 'reviews' => $reviews]);
    }
}
