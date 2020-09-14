<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\User;
use App\Models\Lesson;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class CoursesController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', '2')->get();
        $tags = Tag::all();
        $courses = Course::orderBy('id', 'desc')->paginate(config('variable.paginate'));
        return view('pages.all_courses', compact(['courses', 'teachers', 'tags']));
    }

    public function show(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $otherCourses = Course::inRandomOrder()->limit(config('variable.other_course'))->get();
        $lessons = $course->lessons()
            ->where('title', 'LIKE', '%' . $request->lesson_name . '%')
            ->paginate(config('variable.paginate_lesson'));
        $reviews = $course->reviews;
        $ratingStar = [
            'full_star' => config('variable.full_star'),
            'good_rating' => config('variable.good_rating'),
            'normal_rating' => config('variable.normal_rating'),
            'bad_rating' => config('variable.bad_rating'),
            'very_bad_rating' => config('variable.very_bad_rating')
        ];

        return view('pages.detail_course', compact(['course', 'otherCourses', 'lessons', 'reviews',
            'ratingStar']));
    }

    public function search(Request $request)
    {
        $teachers = User::where('role', '2')->get();
        $tags = Tag::all();
        $courses = Course::query()
            ->OrderByTimes($request->times)
            ->NameCourse($request->name_course)
            ->OrderByStudents($request->students)
            ->OrderByLessosn($request->lessons)
            ->OrderByReviews($request->reviews)
            ->OrderCourse($request->order_by_time)
            ->TeacherFind($request->teacher)
            ->FindByTag($request->tags)
            ->paginate(config('variable.paginate'));
        return view('pages.all_courses', compact('courses', 'teachers', 'tags'));
    }

    public function searchLessons(Request $request, $courseId)
    {

    }
}
