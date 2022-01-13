<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_id = DB::table('users')->where('id', '!=', 1)->pluck('id');
        $courses = DB::table('courses as c')->join('users as u','c.user_id', '=', 'u.id')->select('c.id','c.title', 'c.price', 'c.user_id as owner_id', 'u.name as owner_name')->get();
        $orders = [];

        $order_status = ['paid', 'canceled', 'unpaid', 'expired'];

        foreach($users_id as $user_id) {
            $random_courses = $courses->random(2);
            $status = $order_status[rand(0,3)];

            array_push($orders, [
                'user_id' => $user_id,
                'course_id' => $random_courses[0]->id,
                'product_name' => $random_courses[0]->title,
                'price' => $random_courses[0]->price,
                'owner_id' => $random_courses[0]->owner_id,
                'owner_name' => $random_courses[0]->owner_name,
                'status' => $status,
                'paid_at' => $status == 'paid' ? Carbon::now() : Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]);

            array_push($orders, [
                'user_id' => $user_id,
                'course_id' => $random_courses[1]->id,
                'product_name' => $random_courses[1]->title,
                'price' => $random_courses[1]->price,
                'owner_id' => $random_courses[1]->owner_id,
                'owner_name' => $random_courses[1]->owner_name,
                'status' => $status,
                'paid_at' => $status == 'paid' ? Carbon::now() : Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]);
        }

        DB::table('orders')->insert($orders);

    }
}
