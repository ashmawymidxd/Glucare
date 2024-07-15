<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_recommendation_id',
        'user_id',
        'status',
    ];

    public function activity(){
        return $this->belongsTo(ActivityRecommendation::class,'activity_recommendation_id');
    }
}
