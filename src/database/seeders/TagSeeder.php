<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [];

        foreach(range(1, 10) as $i) {
            $strRandom = Str::random(5);
            array_push($tags, [
                'name' => "Course Tag " . $strRandom,
                'slug' => "course-tag-" . $strRandom,
                'user_id' => random_int(2, 11),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);
        }

        DB::table('tags')->insert($tags);

        
        $tags_id = DB::table('tags')->pluck('id');
        $courses_id = DB::table('courses')->pluck('id');


        $course_tags_relations = [];


        foreach ($courses_id as $course_id) {
            
            $randomSelectedTagId = $tags_id->random(3);

            array_push($course_tags_relations, [
                "course_id" => $course_id,
                "tag_id" => $randomSelectedTagId[0]
            ]);

            array_push($course_tags_relations, [
                "course_id" => $course_id,
                "tag_id" => $randomSelectedTagId[1]
            ]);

            array_push($course_tags_relations, [
                "course_id" => $course_id,
                "tag_id" => $randomSelectedTagId[2]
            ]);
        }

        DB::table('course_tags')->insert($course_tags_relations);
    }
}
