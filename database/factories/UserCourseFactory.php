<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\UserCourse;
use App\Model;
use Faker\Generator as Faker;

$factory->define(UserCourse::class, function (Faker $faker) {
    $courseId = mt_rand(1, 50);
    $userId = mt_rand(26, 150);
    while ($courseId == $userId) {
        $courseId = mt_rand(1, 20);
    }
    return [
        'user_id' => $userId,
        'course_id' => $courseId
    ];
});
