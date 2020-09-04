<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class LessonReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $review = new Review();
        $data = [
            'user_id' => Auth::id(),
            'lesson_id' => $request->input('lesson_id'),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ];
        $review::create($data);
        return redirect()->back();
    }
}
