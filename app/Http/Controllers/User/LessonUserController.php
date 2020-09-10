<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLesson;
use App\Http\Requests\LessonUserRequest;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonUserController extends Controller
{
    public function store($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->lessonLearner()->attach(Auth::id());
        return redirect()->route('lesson.detail', $id);
    }
}
