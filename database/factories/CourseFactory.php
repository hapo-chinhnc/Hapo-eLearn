<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Course;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'description' => $faker->text(200),
        'requirement' => $faker->text(200),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        'teacher_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
