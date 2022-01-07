<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'user_id' => 1,
            'title' => 'Kelas ' . Str::random(5),
            'description' => 'lorem ipsum dolor sit amet',
            'image' => 'https://picture.com/1.jpg',
            'price' => random_int(100000, 999999),
            'total_duration' => random_int(100, 999),
            'is_released' => false,
        ]);
    }
}
