<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Review;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'content' => $faker->text(200),
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        // 'lesson_id' => $faker->numberBetween($min = 1, $max = 20),
        'course_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
