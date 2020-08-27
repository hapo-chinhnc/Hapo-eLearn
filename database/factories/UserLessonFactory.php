<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\UserLesson;

$factory->define(UserLesson::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'lesson_id' => $faker->numberBetween($min = 1, $max = 20)
    ];
});
