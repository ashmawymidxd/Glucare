<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDataResource extends JsonResource
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
            'user_id'=>$this->user_id,
            'glucose_level'=>$this->blood_glucose_level,
            'bmi'=>$this->bmi,
            'diabetic_status' => $this->patientdiabetes->diabetes_status,
            'favorite_food' => $this->favoriteFood->favorite_food,
        ];
    }
}
