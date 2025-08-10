<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningResourceKeyword extends Model
{
    protected $fillable = [
        'learning_resource_id',
        'keyword_id',
    ];

    public function learningResource()
    {
        return $this->belongsTo(LearningResource::class, 'learning_resource_id');
    }

    public function keyword()
    {
        return $this->belongsTo(Keyword::class, 'keyword_id');
    }
}
