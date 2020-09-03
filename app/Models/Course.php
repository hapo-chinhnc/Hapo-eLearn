<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\UserCourse;
use App\Models\CourseTag;
use Illuminate\Database\Eloquent\Model;
use App\User;

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function getReviewTimesAttribute()
    {
        return $this->reviews->count();
    }

    public function getAvgStarAttribute()
    {
        $avgStar = $this->reviews->avg('rating');
        return floor($avgStar);
    }

    public function scopeRatingTimes($query, $star)
    {
        $query = $this->reviews->where('rating', $star)->count();
        return $query;
    }

    public function scopePrecentRating($query, $star)
    {
        $query = $this->RatingTimes($star);
        $allRatingTimes = ($this->review_times) ?: 1;
        $percent = $query / $allRatingTimes * 100;
        return $percent;
    }

    public function learner()
    {
        return $this->belongsToMany(User::class, 'user_course')->withPivot('id');
    }
}
