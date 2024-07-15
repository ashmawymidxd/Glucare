<?php

namespace App\Http\Livewire\Dietary;
use App\Models\DietaryRecommendation;
use App\Models\PaientDietry;
use App\Models\PatientRatingFood;
use App\Models\PatientFavoriteFood;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class DietaryRecommendationList extends Component
{
    public $check = false;
    public $favorite_food;
    public $userFavoriteFood = false;
    public $ai_recommenders = [];

    public function render()
    {
        $user_id = Auth::id();

        $patientFavoriteFoodStatus = PatientFavoriteFood::where('user_id', $user_id)->first();
        if ($patientFavoriteFoodStatus) {
            $this->userFavoriteFood = true;
        }

        if($this->ai_recommenders){
            $drs = DietaryRecommendation::whereIn('id',$this->ai_recommenders)->get();
        }
        else{
            $drs = DietaryRecommendation::get();
        }

        return view('livewire.dietary.dietary-recommendation-list',['drs' => $drs]);
    }

    public function ai_recommendation() {
        try {
            $data = [
                'user' => [
                    'user_id' => Auth::user()->id,
                    'glucose_level' => Auth::user()->patientData->blood_glucose_level,
                    'bmi' => Auth::user()->patientData->bmi,
                    'diabetic_status' => Auth::user()->patientDiabetes[0]->diabetes_status,
                    'favorite_food' => Auth::user()->favoriteFood->favorite_food,
                ]
            ];

            // Send request to this endpoint with header and handle potential errors
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(50)->post('http://127.0.0.1:5200/recommend_food', $data);

            if ($response->failed()) {
                $this->check = 'Error occurred while fetching AI Recommendations';
            } else {
                $recommended_array = [];
                $response_data = $response->json();

                foreach ($response_data as $item) {
                    if (isset($item[0])) {
                        $recommended_array[] = $item[0];
                    }
                }

                $this->ai_recommenders = $recommended_array;
            }
        } catch (\Exception $e) {
            // Handle the exception and set an error message
            $this->check = 'An error occurred: ' . $e->getMessage();
        }
    }

    public function checkout($id)
    {
        $user = Auth::user();
        $currentDate = now()->format('Y-m-d');

        // Check if the user has already checked out a male dietary recommendation today
        $existingMaleDietaryCount = PaientDietry::where('user_id', $user->id)
        ->whereDate('created_at', $currentDate)
        ->count();

        // Allow checkout only if the user has not already checked out a male dietary recommendation today
        if ($existingMaleDietaryCount === 0) {
            $this->check = true;
            $paientDietry = new PaientDietry();
            $paientDietry->dietary_recommendation_id = $id;
            $paientDietry->user_id = $user->id;
            $paientDietry->save();

            // Notify the user that they have successfully
            $this->check = 'You have successfully';
        } else {
            // Notify the user that they can't check out more than one male dietary recommendation per day
            $this->check ='You can only check out one male dietary recommendation per day.';
        }
    }

    public function closeModel(){
        $this->check = false;
    }

    public function addLike($id)
    {
        // Check if the user has already liked the dietary recommendation
        $existingLike = PatientRatingFood::where('user_id', Auth::id())
            ->where('dietary_recommendation_id', $id)
            ->where('liked', 1)
            ->count();

        if ($existingLike === 0) {
            $patientRatingFood = new PatientRatingFood();
            $patientRatingFood->dietary_recommendation_id = $id;
            $patientRatingFood->user_id = Auth::id();
            $patientRatingFood->liked = 1; // Set liked to 1
            $patientRatingFood->save();

            $this->check = 'Like';
        } else {
            $this->check = 'You have already liked this food recommendation';
        }
    }

    public function addDislike($id){
        //  update the user's like status to 0
        $patientRatingFood = PatientRatingFood::where('user_id', Auth::id())
            ->where('dietary_recommendation_id', $id)
            ->where('liked', 1)
            ->first();

        if ($patientRatingFood) {
            $patientRatingFood->liked = 0;
            $patientRatingFood->save();
            $this->check = 'Dislike';
        } else {
            $this->check = 'You have already disliked this food recommendation';
        }

    }

    public function addFavoriteFood(){
        // validate request dat
        $this->validate([
            'favorite_food' => 'required'
        ]);
        $user = Auth::user();
        $patientFavoriteFood = new PatientFavoriteFood();
        $patientFavoriteFood->user_id = $user->id;
        $patientFavoriteFood->favorite_food = $this->favorite_food;
        $patientFavoriteFood->save();
        $this->check = 'Favorite food added successfully';

    }

}

