<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; use App\Http\Requests\UpdatePlaceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        if(isset($places) && $places->count() > 0){
            return response()->json($places);
        } else {
            return response()->json(["message" => "There are no places in the database"]);
        }
    }

    public function store(Request $request){
        Place::create($request->all());
        return response()->json(["msg" => "Place created successfully"]);
    }

    public function update(UpdatePlaceRequest $request, Place $place){
        $place->update($request->all());
        return response()->json(["msg"=> "Place was updated successfully"]);
    }
}
