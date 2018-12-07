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
            'totalPrice' => round((1 - ($this->discount/100)) * $this->price, 2),
                // 45/100 = .45  /discount in decimals
                // 1 - .45 = 0.55  /1 (=100 %) - discount = discount
                // 0.55 * 593 = 326.15  /discount  * price
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(), 2) : 'No rating yet',
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
