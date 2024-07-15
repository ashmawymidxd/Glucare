<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Validation
        return [
            'gender' => 'required',
            'age' => 'required|numeric',
            'hypertension' => 'required|boolean',
            'heart_disease' => 'required|boolean',
            'smoking_history' => 'required|string',
            'bmi' => 'required|numeric',
            'HbA1c_level' => 'required|numeric',
            'blood_glucose_level' => 'required|numeric',
        ];
    }
}
