<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumChat extends Model
{
    protected $fillable = [
        'user_id',
        'forum_id',
        'chat',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    public function likes()
    {
        return $this->hasMany(ForumChatLike::class, 'forum_chat_id', 'id');
    }
}
