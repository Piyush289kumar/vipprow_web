<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppConfiguration extends Model
{
    // Fillable fields
    protected $fillable = [
        'app_name',
        'phone',
        'email',
        'address',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'youtube_link',
        'linkedin_link',
        'whatsapp_link',
        'playstore_link',
        'appstore_link',
        'about',
    ];
    public static function canCreate(): bool
    {
        return \App\Models\AppConfiguration::count() === 0;
    }
}
