<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\UserLesson;
use App\Models\Review;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'description', 'requirement', 'time', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function userLesson()
    {
        return $this->hasMany(UserLesson::class);
    }

    public function getLessonUserAttribute()
    {
        return $this->userLesson()->count();
    }

    public function lessonReviews()
    {
        return $this->hasMany(Review::class)->whereNull('course_id');
    }

    public function getLessonReviewTimesAttribute()
    {
        return $this->lessonReviews->count();
    }

    public function getLessonAvgStarAttribute()
    {
        $avgStar = $this->lessonReviews->avg('rating');
        return floor($avgStar);
    }

    public function scopeLessonRatingTimes($query, $star)
    {
        $query = $this->lessonReviews->where('rating', $star)->count();
        return $query;
    }

    public function scopeLessonPrecentRating($query, $star)
    {
        $query = $this->LessonRatingTimes($star);
        $allRatingTimes = ($this->lesson_review_times) ?: 1;
        $percent = $query / $allRatingTimes * 100;
        return $percent;
    }
}
