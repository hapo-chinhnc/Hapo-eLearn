<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCourse;
use App\Models\Course;
use App\Http\Requests\UpdateProfileResquest;
use DateTime;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $courses = $user->courseOfUser;
        $courseList = [];
        foreach ($courses as $course) {
            $courseImage = Course::findOrFail($course->course_id);
            $courseList [] = $courseImage;
        }
        return view('pages.profile', compact('user', 'courseList'));
    }

    public function update(UpdateProfileResquest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email_update'),
            'birth_day' => $request->get('birth_day'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'about' => $request->get('about')
        ]);
        return redirect()->back()->with('succses', trans('messages.update'));
    }

    public function uploadAvatar(AvatarRequest $request, $id)
    {
        $user = User::find($id);
        $image = $user->avatar;
        if ($request->hasFile('avatar')) {
            Storage::delete('public/images/' . $image);
            $fileExtension = $request->file('avatar')->getClientOriginalExtension();
            $avatarName = $id . '_avatar_' . time() . '.' . $fileExtension;
            $request->file('avatar')->storeAs('public/images', $avatarName);
        }
        $user->avatar = $avatarName;
        $user->save();
        return redirect()->back()->with('succses', trans('messages.update'));
    }
}
