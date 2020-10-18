<?php

namespace App\Http\Resources;
use App\Models\Review;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'created_at'=>$this->createt_at,
            'rating'=> $this->rating,
            'content'=>$this->content,
            'booking_id'=>$this->booking_id,
            'bookable_id'=>$this->bookable_id   
        ];
    }
}
