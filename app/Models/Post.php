<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $fillable = ['title', 'cover_image', 'description','user_id'];

    public function userPost(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'imageable_id', 'user_id');
    }
}
