<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_name',
        'website_logo',
        'website_favicon',
        'website_email',
        'website_phone',
        'website_address',
        'website_facebook',
        'website_twitter',
        'website_instagram',
        'website_youtube',
        'website_whatsapp',
        'website_description'
    ];
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}