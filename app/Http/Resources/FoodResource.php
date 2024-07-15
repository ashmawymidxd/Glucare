<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'food_id'=>$this->id,
            'breakfast'=>$this->breakfast,
            'lunch'=>$this->lunch,
            'dinner'=>$this->dinner,
            'totalCalories'=>$this->totalCalories,
            'carbohydrates'=>$this->carbohydrates,
            'proteins'=>$this->proteins,
            'fats'=>$this->fats,
        ];
    }
}
