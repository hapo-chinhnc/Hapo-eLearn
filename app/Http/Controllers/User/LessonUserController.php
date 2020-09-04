<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLesson;
use App\Http\Requests\LessonUserRequest;

class LessonUserController extends Controller
{
    public function store(LessonUserRequest $request)
    {
        $lessonUser = new UserLesson();
        $lessonId = $request->input('lesson_id');
        $data = [
            'user_id' => $request->input('user_id'),
            'lesson_id' => $lessonId
        ];
        $lessonUser::create($data);
        return redirect()->route('lesson.detail', $lessonId);
    }
}
