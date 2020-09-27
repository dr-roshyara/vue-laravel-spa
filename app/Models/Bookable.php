<?php

namespace App\Models;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{ 
    use HasFactory;
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
