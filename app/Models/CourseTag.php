<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTag extends Model
{
    protected $fillable = [
        'tag_id', 'course_id'
    ];

    protected $table = 'course_tag';
}
