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

    public function scopeNameCourse($query, $request)
    {
        if ($request->has('name_course')) {
            $query->where('title', 'like', '%' . $request->name_course . '%');
        }
        return $query;
    }

    public function scopeOrderCourse($query, $request)
    {
        if ($request->order_by_time == 0) {
            $query->orderBy('id', 'desc');
        }
        return $query;
    }

    public function scopeTeacherFind($query, $request)
    {
        if ($request->teacher) {
            $query->where('teacher_id', $request->teacher);
        }
        return $query;
    }

    public function scopeFindByTag($query, $request)
    {
        if ($request->tags) {
            $query->join('course_tag', 'courses.id', '=', 'course_id')
            ->join('tags', 'tags.id', '=', 'course_tag.tag_id')
            ->where('tags.id', $request->tags)
            ->get(['courses.*']);
        }
        return $query;
    }

    public function scopeOrderByStudents($query, $request)
    {
        if ($request->students == 'most') {
            $query->withCount('userCourse')
                ->orderBy('user_course_count', 'desc');
        }

        if ($request->students == 'least') {
            $query->withCount('userCourse')
                ->orderBy('user_course_count');
        }
        return $query;
    }

    public function scopeOrderByLessosn($query, $request)
    {
        if ($request->lessons == 'most-lessons') {
            $query->withCount('lessons')->orderBy('lessons_count', 'desc');
        }

        if ($request->lessons == 'least-lessons') {
            $query->withCount('lessons')->orderBy('lessons_count');
        }
        return $query;
    }

    public function scopeOrderByReviews($query, $request)
    {
        if ($request->reviews == 'most-reviews') {
            $query->withCount('reviews')->orderBy('reviews_count', 'desc');
        }

        if ($request->reviews == 'least-reviews') {
            $query->withCount('reviews')->orderBy('reviews_count');
        }
        return $query;
    }
}
