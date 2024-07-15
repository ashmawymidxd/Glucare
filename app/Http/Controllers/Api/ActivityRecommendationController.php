<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityRecommendation;
use App\Http\Resources\ActivityResource;

class ActivityRecommendationController extends Controller
{
    // get all activity recommendations
    public function index()
    {
        $activityRecommendations = ActivityResource::collection(ActivityRecommendation::get());
        return response()->json($activityRecommendations);
    }

    // store activity recommendation
    public function store(Request $request)
    {
        $activityRecommendation = new ActivityRecommendation([
            'morning' => $request->get('morning'),
            'image'=>'https://th.bing.com/th/id/OIP.4AffYoUmkyL0qlnstRa4-QHaEp?w=301&h=189&c=7&r=0&o=5&pid=1.7',
            'noon' => $request->get('noon'),
            'night' => $request->get('night'),
        ]);
        $activityRecommendation->save();
        return response()->json($activityRecommendation);
    }

    // insert Many activity recommendations
    public function insertMany(Request $request)
    {
        $activityRecommendations = $request->all();
        $insertedRecommendations = [];

        foreach ($activityRecommendations as $recommendation) {
            $activityRecommendation = new ActivityRecommendation([
                'morning' => $recommendation['morning'],
                'image'=>'https://th.bing.com/th/id/OIP.4AffYoUmkyL0qlnstRa4-QHaEp?w=301&h=189&c=7&r=0&o=5&pid=1.7',
                'noon' => $recommendation['noon'],
                'night' => $recommendation['night'],
            ]);
            $activityRecommendation->save();
            $insertedRecommendations[] = $activityRecommendation;
        }

        return response()->json($insertedRecommendations);
    }
}
