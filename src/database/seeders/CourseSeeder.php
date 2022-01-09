<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [];

        for ($i = 1; $i <= 100; $i++) {
            array_push($courses, [
                'user_id' => random_int(1, 10),
                'title' => 'Course ' . Str::random(6),
                'description' => 'lorem ipsum dolor sit amet',
                'image' => 'https://picture.com/1.jpg',
                'price' => random_int(100000, 999999),
                'total_duration' => random_int(100, 999),
                'is_released' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);
        }

        DB::table('courses')->insert($courses);
    }
}
