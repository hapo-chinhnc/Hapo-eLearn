<?php

use Illuminate\Database\Seeder;
use App\Models\CourseTag;

class CourseTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CourseTag::class, 30)->create();
    }
}
