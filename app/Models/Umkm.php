<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'no_npwp',
        'location',
        'umkm_photo',
        'since',
        'logo',
        'business_cash',
        'regency',
        'province',
        'is_approve',
        'reject_message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employers()
    {
        return $this->hasMany(Employer::class, 'umkm_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'umkm_id');
    }

    public function transactionCategories()
    {
        return $this->hasMany(TransactionCategory::class, 'umkm_id');
    }

    public function businessCashHistories()
    {
        return $this->hasMany(BusinessCashHistory::class, 'umkm_id');
    }
}
