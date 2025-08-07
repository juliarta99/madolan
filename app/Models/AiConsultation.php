<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiConsultation extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'chat',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
