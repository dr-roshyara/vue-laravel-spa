<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Models\Bookable;
use Models\Booking;
class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary(); 
            $table->unsignedDouble('rating');
            $table->text('content');
            $table->foreignId('bookable_id')->constrained()->onDelete('cascade');
            $table->foreignId('booking_id')  ->constrained()  ->onDelete('cascade');
              
            //$table->unsignedInteger('bookable_id')->index();
             //$table->foreign('bookable_id')->references('id')->on('bookables');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
