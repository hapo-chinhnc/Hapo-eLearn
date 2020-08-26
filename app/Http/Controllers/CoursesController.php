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
        $courses = Course::withCount(['lessons', 'userCourse'])->paginate(config('variable.paginate'));
        return view('pages.all_courses', compact(['courses']));
    }

    public function show($id)
    {
        $selectCourse = Course::findOrFail($id);
        $course = Course::withCount(['lessons', 'userCourse'])->findOrFail($id);
        $otherCourses = Course::inRandomOrder()->limit(5)->get();
        $courseTimes = $selectCourse->lessons()->sum('time');
        $lessons = $selectCourse->lessons()->paginate(config('variable.paginateLesson'));
        return view('pages.detail_course', compact(['course', 'otherCourses', 'lessons', 'courseTimes']));
    }
}
