<?php

namespace App\Http\Controllers\Api;
use App\Models\Review;
use App\Http\Resources\ReviewResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function show($id){
        return new ReviewResource(Review::findorFail($id));
    }
}
