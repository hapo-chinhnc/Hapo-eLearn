<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(config('variable.paginate'));
        return view('pages.all_courses', compact(['courses']));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $otherCourses = Course::inRandomOrder()->limit(config('variable.other_course'))->get();
        $lessons = $course->lessons()->paginate(config('variable.paginate_lesson'));
        $reviews = $course->reviews;
        $findPivote = $course->learner()->wherePivot('user_id', Auth::id())->first();
        $pivotId = 0;
        if ($findPivote == true) {
            $pivotId = $findPivote->pivot->id;
        }
        $checkLearnLesson = array();
        $pivotIdLesson = 0;
        foreach ($lessons as $lesson) {
            $findPivotLesson = $lesson->lessonLearner()->wherePivot('user_id', Auth::id())->first();
            $pivotIdLesson = 0;
            if ($findPivotLesson == true) {
                $pivotIdLesson = $findPivotLesson->pivot->id;
            }
            array_push($checkLearnLesson, $pivotIdLesson);
        }
        $ratingStar = [
            'full_star' => config('variable.full_star'),
            'good_rating' => config('variable.good_rating'),
            'normal_rating' => config('variable.normal_rating'),
            'bad_rating' => config('variable.bad_rating'),
            'very_bad_rating' => config('variable.very_bad_rating')
        ];
        return view('pages.detail_course', compact(['course', 'otherCourses', 'lessons', 'reviews',
            'ratingStar', 'pivotId', 'checkLearnLesson']));
    }
}
