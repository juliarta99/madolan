<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'name',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'maxLength' => 100
            ]
        ];
    }

    public function ai_consultations()
    {
        return $this->hasMany(AiConsultation::class, 'category_id');
    }

    public function forums()
    {
        return $this->hasMany(Forum::class, 'category_id');
    }

    public function learningResources()
    {
        return $this->hasMany(LearningResource::class, 'category_id');
    }
}
