<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'no_handphone',
        'picture',
        'gender',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function umkm()
    {
        return $this->hasOne(Umkm::class, 'user_id');
    }

    public function mentor()
    {
        return $this->hasOne(Mentor::class, 'user_id');
    }

    public function ai_consultations()
    {
        return $this->hasMany(AiConsultation::class, 'user_id');
    }

    public function forums()
    {
        return $this->hasMany(Forum::class, 'user_id');
    }

    public function votedForums()
    {
        return $this->belongsToMany(Forum::class, 'forum_votes', 'user_id', 'forum_id')->withTimestamps();
    }

    public function forumChats()
    {
        return $this->hasMany(ForumChat::class, 'user_id', 'id');
    }

    public function forumChatLikes()
    {
        return $this->hasMany(ForumChatLike::class, 'user_id', 'id');
    }
}
