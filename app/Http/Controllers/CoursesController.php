<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses')->paginate(config('variable.paginate'));
        return view('pages.all_courses', compact('courses'));
    }
}
