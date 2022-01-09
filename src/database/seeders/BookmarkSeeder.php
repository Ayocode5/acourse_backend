<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookmarks = [];

        foreach(User::all() as $user) {
            array_push($bookmarks, [
                'user_id' =>  $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]);
        }

        DB::table('bookmarks')->insert($bookmarks);

        //Get all bookmarks with courses
        $bookmarks = Bookmark::with('courses')->get();
        $users_id = Course::all()->pluck('id');

        foreach($bookmarks as $bookmark) {
            $bookmark->courses()->sync($users_id->random(mt_rand(2,5)));
        }

    }
}
