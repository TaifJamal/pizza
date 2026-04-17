<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryRescource;
use Illuminate\Http\Resources\Json\JsonResource;

class MealRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'image' =>  url('uploads/meals/' . $this->image),
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category' => new CategoryRescource($this->category),
        ];
    }
}
