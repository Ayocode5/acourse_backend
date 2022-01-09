<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        for($i = 1; $i <= 10; $i++) {
            $strRandom = Str::random(5);
            array_push($categories, [
                'name' => "Course Kategori " . $strRandom,
                'slug' => "course-kategori-" . $strRandom,
                'user_id' => random_int(2, 11),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);
        }

        DB::table('categories')->insert($categories);


        $categories_id = DB::table('categories')->pluck('id');
        $courses_id = DB::table('courses')->pluck('id');

        $course_categories_relations = [];

        foreach ($courses_id as $course_id) {
            
            $randomSelectedCategoryId = $categories_id->random(3);

            array_push($course_categories_relations, [
                "course_id" => $course_id,
                "category_id" => $randomSelectedCategoryId[0]
            ]);

            array_push($course_categories_relations, [
                "course_id" => $course_id,
                "category_id" => $randomSelectedCategoryId[1]
            ]);

            array_push($course_categories_relations, [
                "course_id" => $course_id,
                "category_id" => $randomSelectedCategoryId[2]
            ]);
        }

        DB::table('course_categories')->insert($course_categories_relations);
    }
}
