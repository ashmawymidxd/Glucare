<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DietaryRecommendation;
use App\Http\Resources\FoodResource;

class DietaryRecommendationController extends Controller
{
    // get all dietary recommendations
    public function index()
    {
        // $dietaryRecommendations = DietaryRecommendation::all();
        $dietaryRecommendations = FoodResource::collection(DietaryRecommendation::get());
        return response()->json($dietaryRecommendations);
    }

    // store dietary recommendation
    public function store(Request $request)
    {
        $dietaryRecommendation = new DietaryRecommendation([
            'breakfast' => $request->get('breakfast'),
            'lunch' => $request->get('lunch'),
            'dinner' => $request->get('dinner'),
            'image' => $request->get('image'),
            'totalCalories' => $request->get('totalCalories'),
            'carbohydrates' => $request->get('carbohydrates'),
            'proteins' => $request->get('proteins'),
            'fats' => $request->get('fats')
        ]);
        $dietaryRecommendation->save();
        return response()->json($dietaryRecommendation);
    }

    // insert Many dietary recommendations food
    public function insertMany(Request $request)
    {
        $dietaryRecommendations = $request->all();
        $insertedRecommendations = [];

        foreach ($dietaryRecommendations as $recommendation) {
            $dietaryRecommendation = new DietaryRecommendation([
                'breakfast' => $recommendation['breakfast'],
                'lunch' => $recommendation['lunch'],
                'dinner' => $recommendation['dinner'],
                'image' => 'https://via.placeholder.com/150',
                'totalCalories' => $recommendation['totalCalories'],
                'carbohydrates' => $recommendation['carbohydrates'],
                'proteins' => $recommendation['proteins'],
                'fats' => $recommendation['fats']
            ]);
            $dietaryRecommendation->save();
            $insertedRecommendations[] = $dietaryRecommendation;
        }

        return response()->json($insertedRecommendations);
    }

}
