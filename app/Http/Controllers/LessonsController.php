<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class LessonsController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $otherCourses = Course::query()
            ->OrderByStudents('most')
            ->limit(config('variable.other_course'))
            ->get();
        $lessonReviews = $lesson->lessonReviews()->orderBy('id', 'desc')->get();
        $courseTags = $lesson->course->tags;
        $ratingStar = [
            'full_star' => config('variable.full_star'),
            'good_rating' => config('variable.good_rating'),
            'normal_rating' => config('variable.normal_rating'),
            'bad_rating' => config('variable.bad_rating'),
            'very_bad_rating' => config('variable.very_bad_rating')
        ];
        return view('pages.lesson_detail', compact(['lesson', 'otherCourses', 'lessonReviews', 'ratingStar',
            'courseTags']));
    }
}
