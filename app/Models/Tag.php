<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title'
    ];

    protected $table = 'tags';

    public function courseTag()
    {
        return $this->belongsToMany(Course::class, 'course_tag');
    }
}
