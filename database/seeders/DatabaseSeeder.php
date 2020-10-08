<?php

namespace Database\Seeders;
use App\Models\Review;
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
        $this->call(BookableTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        
    }
}
