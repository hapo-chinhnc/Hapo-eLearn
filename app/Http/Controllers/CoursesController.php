<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(config('variable.paginate'));
        $courseStatistic = array();
        foreach ($courses as $course) {
            $findId = Course::findOrFail($course['id']);
            $countLessons  = $findId->lessons->toArray();
            $countUsers  = $findId->userCourse->toArray();
            $course['lessons'] = count($countLessons);
            $course['userCourse'] = count($countUsers);
            array_push($courseStatistic, $course);
        }
        return view('pages.all_courses', compact(['courses', 'courseStatistic']));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $otherCourses = Course::all()->random(5);
        $lessons = $course->lessons()->paginate(config('variable.paginateLesson'));
        $courseStatistic['lesson'] = count($lessons);
        $courseStatistic['time'] = $course->lessons()->sum('time');
        $courseStatistic['user'] = $course->userCourse()->count('id');
        return view('pages.detail_course', compact(['course', 'otherCourses', 'lessons', 'courseStatistic']));
    }
}
