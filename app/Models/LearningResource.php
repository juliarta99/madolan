<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class LearningResource extends Model
{
    use Sluggable;

    protected $fillable = [
        'mentor_id',
        'category_id',
        'title',
        'slug',
        'short_description',
        'material',
        'cover',
        'view_count',
        'reject_message',
        'is_approve',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'maxLength' => 100
            ]
        ];
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'learning_resource_keywords', 'learning_resource_id', 'keyword_id');
    }

    public function likes()
    {
        return $this->hasMany(LearningResourceLike::class, 'learning_resource_id');
    }

    public function links()
    {
        return $this->hasMany(LearningResourceLink::class, 'learning_resource_id');
    }
}
