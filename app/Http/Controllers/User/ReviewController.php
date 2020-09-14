<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $review = new Review();
        $data = [
            'user_id' => Auth::id(),
            'course_id' => $request->input('course_id'),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ];
        $review::create($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->back();
    }

    public function update(UpdateReviewRequest $request, $reviewId)
    {
        $review = Review::find($reviewId);
        $data = [
            'content' => $request->update_review,
            'rating' => $request->update_rating
        ];
        $review->update($data);
        return redirect()->back();
    }
}
