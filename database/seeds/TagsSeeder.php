<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tag_title' => '#css'],
            ['tag_title' => '#java'],
            ['tag_title' => '#jQuery'],
            ['tag_title' => '#laravel'],
            ['tag_title' => '#Csharp'],
            ['tag_title' => '#DotNet'],
            ['tag_title' => '#C/C++'],
            ['tag_title' => '#ruby'],
            ['tag_title' => '#python'],
            ['tag_title' => '#nodeJs'],
            ['tag_title' => '#javaScrip'],
            ['tag_title' => '#Sql'],
            ['tag_title' => '#Server'],
            ['tag_title' => '#machineLearning'],
            ['tag_title' => '#Swift'],
            ['tag_title' => '#MatLab'],
            ['tag_title' => '#Perl'],
            ['tag_title' => '#code'],
        ];
        Tag::insert($data);
        DB::table('tags')->insert($data);
    }
}
