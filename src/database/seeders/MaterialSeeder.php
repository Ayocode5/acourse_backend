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
        $num = 11;
        $materials = [];

        while($num <= 20) {
            array_push($materials, [
                'course_id' => 3,
                'title' => "Material $num",
                'duration' => random_int(100, 999),
                'description' => 'lorem ipsum dolor sit amet',
            ]);

            $num++;
        }

        DB::table('materials')->insert($materials);
    }
}
