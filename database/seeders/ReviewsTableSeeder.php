<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bookable;
use App\Models\Review;
class ReviewsTableSeeder extends Seeder 
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bookable::all()->each(function(Bookable $bookable){
               $reviews =  Review::factory()->state(
                   ['bookable_id' => $bookable->id,
                 'booking_id'=>$bookable->bookings->random()->id
                ])->count(3)->create();
               $bookable->reviews()->saveMany($reviews);

        });

    }
}
