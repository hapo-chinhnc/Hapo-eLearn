<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\UserCourse;
use App\Models\CourseTag;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'requirement', 'price', 'teacher_id'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function userCourse()
    {
        return $this->hasMany(UserCourse::class);
    }

    public function getCourseLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getCourseUserAttribute()
    {
        return $this->userCourse()->count();
    }

    public function getCourseTimeAttribute()
    {
        return $this->lessons()->sum('time');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag');
    }

    public function getCourseTagAttribute()
    {
        $tags = $this->tags;
        if (count($tags) == 0) {
            $tag = 'No tag available';
        } else {
            $tag = $tags->first()->title;
            for ($i = 1; $i < count($tags); $i++) {
                $tag .= ', ' . $tags[$i]->title;
            }
        }
        return $tag;
    }
}
