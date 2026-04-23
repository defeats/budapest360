<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\Multimedia;
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
        $places = Place::with(['reviews', 'category'])
            ->filter($request->all())
            ->get();

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
            $place = Place::create($data);
            $place->uploadImages($request->file('place_images'));
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
        $place->increment('clicks');

        $hasRated = Review::where('user_id', auth()->id())
        ->where('place_id', $place->id)
        ->exists();

        return view('places.show', ['place' => $place, 'favourite' => $favourite, 'hasRated' => $hasRated]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $this->authorize('update', $place); 
        
        $categories = Category::all();

        return view('places.edit', [
            'place' => $place,
            'multimedias' => $place->multimedias,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $this->authorize('update', $place);
        
        $data = $request->validated();

        $data['address'] = str_starts_with($data['address'], 'Budapest, ') ? $data['address'] : 'Budapest, ' . $data['address'];
        $place->update($data);

        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $media = Multimedia::find($imageId);
                if ($media) {
                    if (file_exists(public_path($media->file_path))) {
                        unlink(public_path($media->file_path));
                    }
                    $media->delete();
                }
            }
        }

        if ($request->hasFile('place_images')) {
            $place->uploadImages($request->file('place_images'));
        }

        return redirect()
            ->route('places.show', $place->slug)
            ->with('success', 'A hely adatai sikeresen frissültek!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $this->authorize('delete', Place::class);
        $place->delete();
        return redirect()->route('places.index')->with('success', 'Sikeres törlés!');
    }
}
