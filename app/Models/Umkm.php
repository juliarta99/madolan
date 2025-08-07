<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'no_handphone',
        'picture',
        'gender',
        'role',
        'password',
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
