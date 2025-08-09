<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningResourceLike extends Model
{
    protected $fillable = [
        'learning_resource_id',
        'user_id',
    ];

    public function learningResource()
    {
        return $this->belongsTo(LearningResource::class, 'learning_resource_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
