<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $fillable = ['content', 'post_id', 'user_id'];

    public function image()
    {
        return $this->hasOne(Image::class, 'imageable_id', 'user_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}

