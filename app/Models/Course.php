<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\UserCourse;
use App\Models\CourseTag;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $allTime = $this->lessons()->sum('time');
        $timeFormatHours = floor($allTime / 60);
        $timeFormatMinutes = ceil($allTime - floor($allTime / 60) * 60);
        $timeFormat = [
            'hours' => $timeFormatHours,
            'minutes' => $timeFormatMinutes
        ];
        if ($timeFormat['hours'] == 0) {
            $time = "0 (h))";
        } else {
            $time = $timeFormat['hours'] . " (h)";
        }
        return $time;
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
            $tag = $tags->first()->tag_title;
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
        return $this->belongsToMany(User::class, 'user_course');
    }

    public function getCourseLearnedAttribute()
    {
        return $this->learner()->wherePivot('user_id', Auth::id())->exists();
    }

    public function scopeNameCourse($query, $name)
    {
        if ($name != '') {
            $query->where('title', 'like', '%' . $name . '%');
        }
        return $query;
    }

    public function scopeOrderCourse($query, $order)
    {
        if ($order == 0) {
            $query->orderBy('id', 'desc');
        }
        return $query;
    }

    public function scopeTeacherFind($query, $teacherId)
    {
        if ($teacherId) {
            $query->where('teacher_id', $teacherId);
        }
        return $query;
    }

    public function scopeFindByTag($query, $tag)
    {
        if ($tag) {
            $query->join('course_tag', 'courses.id', '=', 'course_id')
            ->join('tags', 'tags.id', '=', 'course_tag.tag_id')
            ->where('tags.id', $tag)
            ->get(['courses.*']);
        }
        return $query;
    }

    public function scopeOrderByStudents($query, $students)
    {
        if ($students == 'most') {
            $query->withCount('learner')
                ->orderBy('learner_count', 'desc');
        }

        if ($students == 'least') {
            $query->withCount('learner')
                ->orderBy('learner_count');
        }
        return $query;
    }

    public function scopeOrderByLessosn($query, $lesson)
    {
        if ($lesson == 'most-lessons') {
            $query->withCount('lessons')->orderBy('lessons_count', 'desc');
        }

        if ($lesson == 'least-lessons') {
            $query->withCount('lessons')->orderBy('lessons_count');
        }
        return $query;
    }

    public function scopeOrderByReviews($query, $reviews)
    {
        if ($reviews == 'most-reviews') {
            $query->withCount('reviews')->orderBy('reviews_count', 'desc');
        }

        if ($reviews == 'least-reviews') {
            $query->withCount('reviews')->orderBy('reviews_count');
        }
        return $query;
    }
}
