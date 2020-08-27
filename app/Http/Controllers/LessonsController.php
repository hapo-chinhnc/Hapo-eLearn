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
        return view('pages.lesson_detail', compact(['lesson', 'otherCourses']));
    }
}
