<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(config('variable.paginate'));
        return view('pages.all_courses', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('pages.detail_course', compact('course'));
    }
}
