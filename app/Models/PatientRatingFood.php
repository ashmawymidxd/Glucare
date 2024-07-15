<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRatingFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'dietary_recommendation_id',
        'user_id',
        'liked',
    ];

    public function dietary(){
        return $this->belongsTo(DietaryRecommendation::class,'dietary_recommendation_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
