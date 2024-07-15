<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDiabetesResource extends JsonResource
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
                'user_id'=>$this->id,
                'diabetes_type'=>$this->diabetes_type,
                'diabetes_status'=>$this->diabetes_status,
            ];
    }
}
