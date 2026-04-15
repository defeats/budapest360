<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\OpenTime;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Place::with(['reviews', 'category']);

        if ($request->has('wifi'))
            $query->where('wifi', true);
        if ($request->has('card_payment'))
            $query->where('card_payment', true);
        if ($request->has('pet_friendly'))
            $query->where('pet_friendly', true);
        if ($request->has('family_friendly'))
            $query->where('family_friendly', true);
        if ($request->has('free_parking'))
            $query->where('free_parking', true);
        if ($request->has('free_entry'))
            $query->where('free_entry', true);
        if ($request->has('student_discount'))
            $query->where('student_discount', true);
        if ($request->has('outdoor_seating'))
            $query->where('outdoor_seating', true);
        if ($request->has('photo_spot'))
            $query->where('photo_spot', true);
        if ($request->has('accessible'))
            $query->where('accessible', true);

        $places = $query->get();

        return view('places.index', [
            'places' => $places
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Place::class);
        $categories = Category::all();
        return view('places.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request)
    {
        $this->authorize('create', Place::class);
        $data = $request->validated();

        if ($request->hasFile('place_images')) {
            $place = Place::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'category_id' => $data['category_id'],
                'post_code' => $data['post_code'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'website' => $data['website'] ?? null,
                'description' => $data['description'],
                'outdoor_seating' => $request->boolean('outdoor_seating'),
                'wifi' => $request->boolean('wifi'),
                'pet_friendly' => $request->boolean('pet_friendly'),
                'family_friendly' => $request->boolean('family_friendly'),
                'card_payment' => $request->boolean('card_payment'),
                'free_parking' => $request->boolean('free_parking'),
                'free_entry' => $request->boolean('free_entry'),
                'photo_spot' => $request->boolean('photo_spot'),
                'accessible' => $request->boolean('accessible'),
                'student_discount' => $request->boolean('student_discount')
            ]);

            foreach ($request->file('place_images') as $file) {
                $name = $file->getClientOriginalName();
                $mime = $file->getClientMimeType();
                $size = $file->getSize();
                $saveAs = time() . '_' . $name;
                $destinationPath = public_path('images');

                $file->move($destinationPath, $saveAs);

                $place->multimedias()->create([
                    'place_id' => $place->id,
                    'user_id' => auth()->id(),
                    'file_path' => 'images/' . $saveAs,
                    'file_name' => $name,
                    'mime_type' => $mime,
                    'file_size' => $size,
                    'is_cover' => false
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'Legalább egy képet fel kell tölteni a helyhez!');
        }

        return redirect()->route('places.index')->with('success', 'Sikeres mentés!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $place = Place::where('slug', $slug)
            ->with(['multimedias', 'category', 'reviews'])
            ->firstOrFail();

        if (auth()->check()) {
            auth()->user()->load('favourites');
        }

        $favourite = Favourite::where('place_id', $place->id)->get();
        $userId = auth()->id();
        $placeId = $place->id;
        $hasRated = false;
        $place->increment('clicks');

        $review = Review::where('user_id', $userId)
            ->where('place_id', $placeId)
            ->first();

        if ($review) {
            $hasRated = true;
        }

        return view('places.show', ['place' => $place, 'favourite' => $favourite, 'userId' => $userId, 'hasRated' => $hasRated]);
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
