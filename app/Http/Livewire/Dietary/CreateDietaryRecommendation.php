<?php

namespace App\Http\Livewire\Dietary;
use App\Models\DietaryRecommendation;

use Livewire\Component;

class CreateDietaryRecommendation extends Component
{
    public $breakfast;
    public $lunch;
    public $dinner;
    public $image;
    public $totalCalories;
    public $carbohydrates;
    public $proteins;
    public $fats;
    public $add_status = false;



    public function render()
    {
        return view('livewire.dietary.create-dietary-recommendation');
    }

    public function addDietary()
    {
        $this->validate([
            'breakfast' => 'required',
            'lunch' => 'required',
            'dinner' => 'required',
            'image' => 'required',
            'totalCalories' => 'required',
            'carbohydrates' => 'required',
            'proteins' => 'required',
            'fats' => 'required',
        ]);

        $DietaryRecommendation = DietaryRecommendation::create([
            'breakfast' => $this->breakfast,
            'lunch' => $this->lunch,
            'dinner' => $this->dinner,
            'image' => $this->image,
            'totalCalories' => $this->totalCalories,
            'carbohydrates' => $this->carbohydrates,
            'proteins' => $this->proteins,
            'fats' => $this->fats,
        ]);
        if($DietaryRecommendation){
            $this->add_status = true;
        }

    }
}
