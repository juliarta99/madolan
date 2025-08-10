<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use Sluggable;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'short_description',
        'content',
        'image',
        'view_count',
        'reject_message',
        'is_approve',
        'is_show',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'maxLength' => 255
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'forum_keywords', 'forum_id', 'keyword_id');
    }

    public function voters()
    {
        return $this->belongsToMany(User::class, 'forum_votes', 'forum_id', 'user_id')->withTimestamps();
    }

    public function forumChats()
    {
        return $this->hasMany(ForumChat::class, 'forum_id', 'id');
    }
}
