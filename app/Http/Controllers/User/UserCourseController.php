<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCourseRequtest;
use Illuminate\Http\Request;
use App\Models\UserCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function store($id)
    {
        $course = Course::findOrFail($id);
        $course->learner()->attach(Auth::id());
        return redirect()->route('courses.show', $id);
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->learner()->detach(Auth::id());
        return redirect()->route('courses.index');
    }
}
