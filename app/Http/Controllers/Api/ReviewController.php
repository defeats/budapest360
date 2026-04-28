<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        if (isset($reviews) && $reviews->count() > 0) {
            return response()->json(['reviews' => $reviews]);
        }
        return response()->json(['msg' => 'There are no places in the DB']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        if (auth()->user()->tokenCan('update:reviews')) {
            $data = $request->validated();
            $review->update($data);

            return response()->json(['msg' => 'Review was updated successfully', 'review' => $review]);
        }
        return response()->json(['msg' => 'You do not have permission to update this place'], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if (auth()->user()->tokenCan('delete:reviews')) {
            $review->delete();
            return response()->json(['msg' => 'Review was deleted successfully', 'review' => $review]);
        }
        return response()->json(['msg' => 'You do not have permission to update this place'], 403);
    }
}
