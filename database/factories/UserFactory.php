<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'remember_token' => Str::random(10),
        'avatar' => $faker->randomElement($array = array(
            'user-img.jpg', 'user-img1.jpg', 'user-img2.jpg', 'user-img3.jpg', 'user-img4.jpg')),
        'phone' => $faker->phoneNumber,
        'role' => '1',
        'birth_day' => now(),
        'address' => $faker->streetAddress,
        'about' => $faker->text(150)
    ];
});
