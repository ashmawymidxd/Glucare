<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientRatingFood;
use App\Http\Resources\PatientRatingFoodResource;
class patientRatingFoodController extends Controller
{
    // get all Patient Rating Food
    public function index()
    {
        $patientRatingFood = PatientRatingFoodResource::collection(PatientRatingFood::all());
        return response()->json($patientRatingFood);
    }

}
