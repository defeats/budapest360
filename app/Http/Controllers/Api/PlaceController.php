<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Requests\StorePlaceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        if(isset($places) && $places->count() > 0){
            return response()->json(['places' => $places]);
        } else {
            return response()->json(["msg" => "There are no places in the database"]);
        }
    }

    public function store(StorePlaceRequest $request){
        $place = Place::create($request->all());
        return response()->json(["msg" => "Place created successfully", "place" => $place]);
    }

    public function update(UpdatePlaceRequest $request, Place $place){
        $place->update($request->all());
        return response()->json(["msg"=> "Place was updated successfully", "place" => $place]);
    }

    public function destroy(Place $place){
        $place->delete();
        return response()->json(["msg" => "Place was deleted successfully"]);
    }
}
