<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of stock' : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round($this->price - ($this->price * $this->discount / 100), 2),
            'rating' => $this->review->count() > 0 ? round($this->review->sum('star')/$this->review->count(), 2) : 'No review yet !!!',
            'href' => [
                'reviews' => route('reviews.index',$this->id)
            ],
        ];
    }
}
