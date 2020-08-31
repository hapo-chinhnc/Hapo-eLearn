<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Review;

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
        $mainCourses = Course::inRandomOrder()->limit(config('variable.home_page_course'))->get();
        $reviews = Review::inRandomOrder()->limit(config('variable.reviews'))->get();
        $fullStar = config('variable.full_star');
        return view('index', compact('mainCourses', 'reviews', 'fullStar'));
    }
}
