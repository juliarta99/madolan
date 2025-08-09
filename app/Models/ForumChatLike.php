<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumChatLike extends Model
{
    protected $fillable = [
        'forum_chat_id',
        'user_id',
    ];

    public function forumChat()
    {
        return $this->belongsTo(ForumChat::class, 'forum_chat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
