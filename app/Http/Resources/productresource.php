<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class productresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id'=>$this->id,
            'price'=>$this->price,
            'name'=>$this->name,
            'des'=>$this->des,
            'image'=>asset('images').'/'.$this->image,
            'category_id'=>$this->cat_id,
        ];
    }
}
