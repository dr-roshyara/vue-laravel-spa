<?php

namespace App\Models;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{ 
    use HasFactory;
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function availablefor($from, $to):bool
    {
        return 0===$this->bookings()->betweenDates($from, $to)->count();
    }
}
