<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\BookableReviewIndexResource as BRIResource ;
use App\Models\Bookable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookableReviewcontroller extends Controller
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
        $bookable =Bookable::findorFail($id);
        // dd($bookable);        

        return BRIResource::collection(
            $bookable
            ->reviews()
            ->latest()
            ->get()
        );
    }
}
