<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientRatingDoctors;

class PatientRatingDoctorsController extends Controller
{

    public function store(Request $request)
    {
        // return $request;
        PatientRatingDoctors::create($request->all());
        return response()->json(['message' => 'Your Rewiev Has Been Saved Thanks.']);
    }

}
