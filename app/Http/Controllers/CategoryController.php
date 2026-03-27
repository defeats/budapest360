<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Place;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $query = Place::where('category_id', $category->id)->with(['reviews', 'category']);

        if ($request->has('wifi')) $query->where('wifi', true);
        if ($request->has('card_payment')) $query->where('card_payment', true);
        if ($request->has('pet_friendly')) $query->where('pet_friendly', true);
        if ($request->has('family_friendly')) $query->where('family_friendly', true);
        if ($request->has('free_parking')) $query->where('free_parking', true);
        if ($request->has('free_entry')) $query->where('free_entry', true);
        if ($request->has('student_discount')) $query->where('student_discount', true);
        if ($request->has('outdoor_seating')) $query->where('outdoor_seating', true);
        if ($request->has('photo_spot')) $query->where('photo_spot', true);
        if ($request->has('accessible')) $query->where('accessible', true);

        $places = $query->get();

        return view('categories.show', [
            'category' => $category,
            'places' => $places
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
