<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class categoryresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category_id'=>$this->id,
            'name'=>$this->name,
            'des'=>$this->des,
            'image'=>asset('images').'/'.$this->image,
        ];
    }
}
