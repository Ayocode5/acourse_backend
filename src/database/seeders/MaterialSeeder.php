<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num = 1;
        $materials = [];

        while($num <= 300) {
            array_push($materials, [
                'course_id' => 3,
                'title' => "Materi ke $num",
                'duration' => random_int(100, 999),
                'description' => 'lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);

            $num++;
        }

        DB::table('materials')->insert($materials);
    }
}
