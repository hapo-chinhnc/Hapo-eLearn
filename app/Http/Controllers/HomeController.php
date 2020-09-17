<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\UserCourse;
use App\Models\UserLesson;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainCourses = Course::query()
            ->OrderByStudents('most')
            ->limit(config('variable.main_course'))
            ->get();

        $otherCourses = Course::inRandomOrder()->limit(config('variable.other_course_home'))->get();
        $reviews = Review::inRandomOrder()->limit(config('variable.reviews'))->get();
        $fullStar = config('variable.full_star');
        $statistic = [
            'courses' => Course::count(),
            'lessons' => Lesson::count(),
            'learner' => User::where('role', User::ROLE['user'])->count()
        ];
        return view('index', compact('mainCourses', 'reviews', 'fullStar', 'statistic', 'otherCourses'));
    }
}
