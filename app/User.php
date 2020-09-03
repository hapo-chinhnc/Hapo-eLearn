<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;
use App\Models\Lesson;

class User extends Authenticatable
{
    use Notifiable;
    const ROLE = [
        'admin' => 0,
        'user' => 1,
        'teacher' => 2
    ];

    const ROLE_LABEL = [
        'admin' => 'Admin',
        'user' => 'Student',
        'teacher' => 'Teacher'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'phone', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleLabelAttribute()
    {
        return self::ROLE_LABEL[array_flip(self::ROLE)[$this->role]];
    }

    public function learned()
    {
        return $this->belongsToMany(Course::class, 'user_course')->withPivot('id');
    }

    public function lessonLearned()
    {
        return $this->belongsToMany(Lesson::class)->withPivot('id');
    }
}
