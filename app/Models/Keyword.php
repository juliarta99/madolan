<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'name'
    ];

    public function forums()
    {
        return $this->belongsToMany(Forum::class, 'forum_keywords', 'keyword_id', 'forum_id');
    }

    public function learningResources()
    {
        return $this->belongsToMany(LearningResource::class, 'learning_resource_keywords', 'keyword_id', 'learning_resource_id');
    }
}
