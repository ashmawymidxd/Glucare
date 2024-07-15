<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PaientDietry;
use App\Models\PatientActivity;

class PatientHistoryController extends Controller
{
    public function dietaryHistory(){
        $dietarys = PaientDietry::where('user_id', Auth::user()->id)->get();
        return view('Website.dietary.patientHistory', compact('dietarys'));
    }
    public function activityHistory(){
        $activitys = PatientActivity::where('user_id', Auth::user()->id)->get();
        return view('Website.activity.patientHistory', compact('activitys'));
    }
}
