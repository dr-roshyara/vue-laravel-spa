<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BookingByReviewShowResource as BookingResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke( $reviewKey, Request $request)
    {
        //
           return new BookingResource(Booking::findByReviewKey($reviewKey)) ?? abort(404);
        
    }
}
