<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Requests\StorePlaceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Place;
use Laravel\Sanctum\HasApiTokens;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        if (isset($places) && $places->count() > 0) {
            return response()->json(['places' => $places]);
        }
        return response()->json(['msg' => 'There are no places in the DB']);
    }

    public function store(StorePlaceRequest $request)
    {
        $place = Place::create($request->all());
        return response()->json(['msg' => 'Place created successfully', 'place' => $place]);
    }

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        if (auth()->user()->tokenCan('update:places')) {
            $data = $request->validated();
            $data['address'] = str_starts_with($data['address'], 'Budapest, ') ? $data['address'] : 'Budapest, ' . $data['address'];
            $place->update($data);

            return response()->json(['msg' => 'Place was updated successfully', 'place' => $place]);
        }
        return response()->json(['msg' => 'You do not have permission to update this place'], 403);
    }

    public function destroy(Place $place)
    {
        if (auth()->user()->tokenCan('delete:places')) {
            $place->delete();
            return response()->json(['msg' => 'Place was deleted successfully']);
        }
        return response()->json(['msg' => 'You do not have permission to delete this place'], 403);
    }
}
