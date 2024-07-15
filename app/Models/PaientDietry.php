<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaientDietry extends Model
{
    use HasFactory;

    protected $fillable = [
        'dietary_recommendation_id',
        'user_id',
        'status',
    ];

    public function dietary(){
        return $this->belongsTo(DietaryRecommendation::class,'dietary_recommendation_id');
    }
}
