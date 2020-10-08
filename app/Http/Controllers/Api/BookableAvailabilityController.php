<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookable;
use App\Models\Bookings;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        //
        // dd("hello");
        $data =$request->validate([
            'from'=>'required |date_format:Y-m-d|after_or_equal:now',
            'to'=>'required |date_format:Y-m-d|after_or_equal:from'
        ]);
        $bookable =Bookable::findorFail($id);
    //    dd($bookable->bookings()->betweenDates($data['from'], $Data['to']));
      return $bookable->availableFor($data['from'], $data['to'])
        ? response()->json(['success'=>"success"])
        :response()->json([
            'test'=>"test"
        ], 404);
    } 
}
