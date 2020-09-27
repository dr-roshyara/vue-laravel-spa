<?php

namespace App\Models;
use App\Models\Bookable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =['bookable_id','from', 'to'];
    use HasFactory;
    public function Bookable(){
        return $this->belongsTo(Bookable::class);
    }
}
