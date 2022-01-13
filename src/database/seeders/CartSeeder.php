<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
        $cart_courses = [];
        $courses_id = DB::table('courses')->pluck('id');

        foreach(range(2, 11) as $i) { 
            array_push($carts, [
                'user_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);

        }

        DB::table('carts')->insert($carts);

        foreach(DB::table('carts')->pluck('id') as $cart_id) {

            $random_selected_course_id = $courses_id->random(rand(2,5));

            foreach($random_selected_course_id as $selected_id) {
                array_push($cart_courses, [
                    'cart_id' => $cart_id,
                    'course_id' => $selected_id
                ]);
            }
            
        } 

        DB::table('cart_courses')->insert($cart_courses);
    }
}
