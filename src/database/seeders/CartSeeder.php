<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = [];

        for ($i=0; $i < 100; $i++) { 
            array_push($carts, [
                'user_id' => random_int(2, 11),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);
        }

        DB::table('carts')->insert($carts);
    }
}
