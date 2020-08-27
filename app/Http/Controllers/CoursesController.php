<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

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
        return view('pages.detail_course', compact(['course', 'otherCourses', 'lessons']));
    }
}
