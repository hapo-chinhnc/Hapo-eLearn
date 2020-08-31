<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\CourseTag;

$factory->define(CourseTag::class, function (Faker $faker) {
    return [
        'tag_id' => $faker->numberBetween($min = 1, $max = 10),
        'course_id' => $faker->numberBetween($min = 1, $max = 20)
    ];
});
