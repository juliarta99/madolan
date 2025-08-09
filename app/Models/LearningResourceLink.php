<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningResourceLink extends Model
{
    protected $fillable = [
        'learning_resource_id',
        'name',
        'link',
    ];

    public function learningResource()
    {
        return $this->belongsTo(LearningResource::class, 'learning_resource_id');
    }
}
