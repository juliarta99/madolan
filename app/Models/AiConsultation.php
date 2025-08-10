<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AiConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'chat',
        'role'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeForUserAndCategory($query, int $userId, int $categoryId)
    {
        return $query->where('user_id', $userId)
                    ->where('category_id', $categoryId)
                    ->orderBy('created_at', 'asc');
    }

    public function scopeByUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeByCategory($query, int $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // Static methods
    public static function getChatContext(int $userId, int $categoryId, int $limit = 10)
    {
        return self::where('user_id', $userId)
                   ->where('category_id', $categoryId)
                   ->orderBy('created_at', 'desc')
                   ->take($limit)
                   ->get()
                   ->reverse()
                   ->values();
    }

    // Helper methods
    public function isFromUser(): bool
    {
        return $this->role === 'user';
    }

    public function isFromAi(): bool
    {
        return $this->role === 'ai';
    }

    public function getFormattedTimeAttribute(): string
    {
        return $this->created_at->format('H:i');
    }

    public function getShortChatAttribute(): string
    {
        return strlen($this->chat) > 100 ? 
               substr($this->chat, 0, 100) . '...' : 
               $this->chat;
    }
}