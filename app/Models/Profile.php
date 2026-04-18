<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'profession',
        'bio',
        'photo',
        'background_image',
        'cv_file',
        'location',
        'email_contact',
        'phone',
        'github_url',
        'linkedin_url',
        'instagram_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
