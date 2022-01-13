<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(10)->create();

        $this->call([
            //CourseSeeder::class,
            //BookmarkSeeder::class,
            //CategorySeeder::class,
            //TagSeeder::class,
            //MaterialSeeder::class,
            //CartSeeder::class,
            //SubscriptionSeeder::class,
            //OrderSeeder::class,
            //PaymentSeeder::class, -> NOPE
            //ViewSeeder::class, -> NOPE
            //UserSeetingSeeder::class
        ]);
    }
}
