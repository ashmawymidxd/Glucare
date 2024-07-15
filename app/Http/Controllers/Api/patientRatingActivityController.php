<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientRatingActivity;
use App\Http\Resources\PatientRatingactivityResource;
use Illuminate\Support\Facades\Auth;

class patientRatingActivityController extends Controller
{
    // get all Patient Rating activity
    public function index()
    {
        $patientRatingactivity = PatientRatingactivityResource::collection(PatientRatingActivity::all());
        return response()->json($patientRatingactivity);
    }


}
