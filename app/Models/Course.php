<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\UserCourse;
use App\Models\CourseTag;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'requirement', 'price', 'teacher_id'
    ];

    const ORDER = [
        'most' => 'most',
        'least' => 'least'
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
            $time = "0 (h)";
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
        if ($name) {
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
            $query->whereHas('tags', function (Builder $q) use ($tag) {
                $q->where('tag_id', $tag);
            })->get();
        }
        return $query;
    }

    public function scopeOrderByStudents($query, $students)
    {
        if ($students == Course::ORDER['most']) {
            $query->withCount('learner')
                ->orderBy('learner_count', 'desc');
        }

        if ($students == Course::ORDER['least']) {
            $query->withCount('learner')
                ->orderBy('learner_count');
        }
        return $query;
    }

    public function scopeOrderByLessosn($query, $lesson)
    {
        if ($lesson == Course::ORDER['most']) {
            $query->withCount('lessons')->orderBy('lessons_count', 'desc');
        }

        if ($lesson == Course::ORDER['least']) {
            $query->withCount('lessons')->orderBy('lessons_count');
        }
        return $query;
    }

    public function scopeOrderByReviews($query, $reviews)
    {
        if ($reviews == Course::ORDER['most']) {
            $query->withCount('reviews')->orderBy('reviews_count', 'desc');
        }

        if ($reviews == Course::ORDER['least']) {
            $query->withCount('reviews')->orderBy('reviews_count');
        }
        return $query;
    }

    public function scopeOrderByTimes($query, $time)
    {
        if ($time == Course::ORDER['most']) {
            $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderByDesc('time');
        }
        if ($time == Course::ORDER['least']) {
            $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderBy('time');
        }
        return $query;
    }
}
