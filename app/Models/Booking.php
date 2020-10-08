<?php

namespace App\Models;
use App\Models\Bookable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =['bookable_id','from', 'to'];
    use HasFactory;
    public function bookable(){
        return $this->belongsTo(Bookable::class);
    }
    public function booking(){
        return $this->hasOne(Review::class);
    }
    public function scopeBetweenDates(Builder $query, $from , $to){
        return $query->where('to','>=', $from)
            ->where('from', '<=', $to);

    }
}
