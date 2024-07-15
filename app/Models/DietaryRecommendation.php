<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietaryRecommendation extends Model
{
    use HasFactory;
    protected $fillable = ['breakfast','lunch','dinner','image','totalCalories','carbohydrates','proteins','fats'];

    // hide timestamps
    protected $hidden = [
        'created_at',
        'updated_at',
        'image',
    ];
}
