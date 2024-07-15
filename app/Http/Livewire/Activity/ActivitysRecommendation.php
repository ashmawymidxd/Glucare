<?php

namespace App\Http\Livewire\Activity;
use App\Models\ActivityRecommendation;
use Livewire\Component;

class ActivitysRecommendation extends Component
{
    public $morning;
    public $noon;
    public $night;
    public $image;
    public $add_status = false;

    public function render()
    {
        return view('livewire.activity.activitys-recommendation');
    }

    public function addActivity(){

        // validation on the data
        $this->validate([
            'morning'=>'required',
            'noon'=>'required',
            'night'=>'required',
            'image'=>'required',
        ]);

        // create
        $activity = ActivityRecommendation::create([
            'morning'=>$this->morning,
            'noon'=>$this->noon,
            'night'=>$this->night,
            'image'=>$this->image,
        ]);

        //notifications
        if($activity){
            $this->add_status = true;
        }
    }
}
