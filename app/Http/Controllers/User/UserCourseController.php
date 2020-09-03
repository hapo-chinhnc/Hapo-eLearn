<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCourseRequtest;
use Illuminate\Http\Request;
use App\Models\UserCourse;

class UserCourseController extends Controller
{
    public function store(UserCourseRequtest $request)
    {
        $userCourse = new UserCourse();
        $courseId = $request->input('course_id');
        $data = [
            'user_id' => $request->input('user_id'),
            'course_id' => $courseId
        ];
        $userCourse::create($data);
        return redirect()->route('courses.show', $courseId);
    }

    public function destroy($id)
    {
        $pivot = UserCourse::findOrFail($id);
        $pivot->delete();
        return redirect()->route('courses.index');
    }
}
