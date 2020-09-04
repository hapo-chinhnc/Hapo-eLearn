<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'content', 'course_id', 'lesson_id', 'rating'
    ];

    protected $table = 'reviews';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
