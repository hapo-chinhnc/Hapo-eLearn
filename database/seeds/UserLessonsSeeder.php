<?php

use Illuminate\Database\Seeder;
use App\Models\UserLesson;

class UserLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserLesson::class, 50)->create();
    }
}
