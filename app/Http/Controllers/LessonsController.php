<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonsController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $otherCourses = Course::inRandomOrder()->limit(config('variable.other_course'))->get();
        $lessonReviews = $lesson->lessonReviews;
        $ratingStar = [
            'fullStar' => config('variable.full_star'),
            'goodRating' => config('variable.good_rating'),
            'normalRating' => config('variable.normal_rating'),
            'badRating' => config('variable.bad_rating'),
            'varyBadRating' => config('variable.very_bad_rating')
        ];
        return view('pages.lesson_detail', compact(['lesson', 'otherCourses', 'lessonReviews', 'ratingStar']));
    }
}
