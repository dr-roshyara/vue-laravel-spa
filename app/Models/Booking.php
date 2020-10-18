<?php

namespace App\Models;
use App\Models\Bookable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\str;

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
    public static function findByReviewKey(string $reviewKey):? Booking 
    {
        return static::where('review_key',$reviewKey)->with('bookable')->get()->first();
        //This type of fetching is called egar loading . Here we fetch Booking model togetehr with the 
        //relationship bookable. That means in stead o f fetching two queeries ,we combine them together. 
        //
    }
     protected static function boot(){
        parent::boot();
        static::creating(function($booking){
                 $booking->review_key=Str::uuid();
        });
    }
}
