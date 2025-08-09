<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumKeyword extends Model
{
    protected $fillable = [
        'forum_id',
        'keyword_id',
    ];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    public function keyword()
    {
        return $this->belongsTo(Keyword::class, 'keyword_id');
    }
}
