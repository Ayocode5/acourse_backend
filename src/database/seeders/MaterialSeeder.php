<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [];

        $courses_id = DB::table('courses')->pluck('id');

        $selectedID = 0;

        foreach(range(1, 300) as $i) {
            
            array_push($materials, [
                'course_id' => $courses_id[$selectedID],
                'title' => "Materi ke $i",
                'duration' => random_int(100, 999),
                'description' => 'lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);

            if(($i % 3) == 0) {
                $selectedID += 1;
            }
        }

        DB::table('materials')->insert($materials);
    }
}
