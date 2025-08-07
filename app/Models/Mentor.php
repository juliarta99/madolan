<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = [
        'user_id',
        'portfolio',
        'is_approve',
        'reject_message',
        'ig_url',
        'fb_url',
        'tiktok_url',
        'yt_url',
        'linkedin_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function learningResources()
    {
        return $this->hasMany(LearningResource::class, 'mentor_id');
    }
}
