<?php

namespace App\Http\Livewire\Activity;
use App\Models\ActivityRecommendation;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientRatingActivity;
use App\Models\PatientActivity;
use Livewire\Component;
use App\Models\User;
use App\Models\PatientData;
use App\Models\PatientFavoriteActivity;
use Illuminate\Support\Facades\Http;

class ActivityRecommendationList extends Component
{
    public $check = false;
    public $favorite_activity;
    public $userFavoriteactivity = false;
    public $ai_recommenders = [];

    public function render()
    {
        $user_id = Auth::id();

        $patientFavoriteactivityStatus = PatientFavoriteActivity::where('user_id', $user_id)->first();
        if ($patientFavoriteactivityStatus) {
            $this->userFavoriteactivity = true;
        }

        $user_data = User::find($user_id);
        if($this->ai_recommenders){
            $ars = ActivityRecommendation::whereIn('id',$this->ai_recommenders)->get();
        }
        else{
            $ars = ActivityRecommendation::get();
        }

        return view('livewire.activity.activity-recommendation-list',['ars' => $ars ,'user_data'=>$user_data]);
    }

    public function ai_recommendation() {
        try {
            $data = [
                'user' => [
                    'user_id' => Auth::user()->id,
                    'glucose_level' => Auth::user()->patientData->blood_glucose_level,
                    'bmi' => Auth::user()->patientData->bmi,
                    'diabetic_status' => Auth::user()->patientDiabetes[0]->diabetes_status,
                    'favorite_activity' => Auth::user()->favoriteActivity->favorite_activity,
                ]
            ];

            // Send request to this endpoint with header and handle potential errors
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(50)->post('http://127.0.0.1:5300/recommend_activity', $data);

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

        // Check if the user has already checked out a male activity recommendation today
        $existingActivityCount = PatientActivity::where('user_id', $user->id)
        ->whereDate('created_at', $currentDate)
        ->count();

        // Allow checkout only if the user has not already checked out a male activity recommendation today
        if ($existingActivityCount === 0) {
            $this->check = true;
            $PatientActivity = new PatientActivity();
            $PatientActivity->activity_recommendation_id = $id;
            $PatientActivity->user_id = $user->id;
            $PatientActivity->save();

            // Notify the user that they have successfully
            $this->check = 'You have successfully';
        } else {
            // Notify the user that they can't check out more than one male activity recommendation per day
            $this->check ='You can only check out one male activity recommendation per day.';
        }
    }

    public function closeModel(){
        $this->check = false;
    }

    public function addLike($id)
    {
        // Check if the user has already liked the activity recommendation
        $existingLike = PatientRatingActivity::where('user_id', Auth::id())
            ->where('activity_recommendation_id', $id)
            ->where('liked', 1)
            ->count();

        if ($existingLike === 0) {
            $patientRatingActivity = new PatientRatingActivity();
            $patientRatingActivity->activity_recommendation_id = $id;
            $patientRatingActivity->user_id = Auth::id();
            $patientRatingActivity->liked = 1; // Set liked to 1
            $patientRatingActivity->save();

            $this->check = 'Like';
        } else {
            $this->check = 'You have already liked this activity recommendation';
        }
    }

    public function addDislike($id){
        //  update the user's like status to 0
        $patientRatingActivity = PatientRatingActivity::where('user_id', Auth::id())
            ->where('activity_recommendation_id', $id)
            ->where('liked', 1)
            ->first();

        if ($patientRatingActivity) {
            $patientRatingActivity->liked = 0;
            $patientRatingActivity->save();
            $this->check = 'Dislike';
        } else {
            $this->check = 'You have already disliked this activity recommendation';
        }

    }

    public function addFavoriteactivity(){
        // validate request dat
        $this->validate([
            'favorite_activity' => 'required'
        ]);
        $user = Auth::user();
        $patientFavoriteactivity = new PatientFavoriteActivity();
        $patientFavoriteactivity->user_id = $user->id;
        $patientFavoriteactivity->favorite_activity = $this->favorite_activity;
        $patientFavoriteactivity->save();
        $this->check = 'Favorite activity added successfully';

    }

}
