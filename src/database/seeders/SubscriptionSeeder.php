<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [];
        $users_id = DB::table('users')->pluck('id');
        $courses_id = DB::table('courses')->pluck('id');

        foreach($users_id as $user_id) {
            $random_selected_course_id = $courses_id->random(rand(1,5));
            
            foreach($random_selected_course_id as $rd) {
                array_push($subscriptions, [
                    'user_id' => $user_id,
                    'course_id' => $rd,
                    'is_active' => ($user_id % 2) == 0 ? true : false,
                    'subscribed_at' => Carbon::now(),
                    'expired_at' => new Carbon(new \DateTime('first day of may 2022')),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        DB::table('subscriptions')->insert($subscriptions);

    }
}
