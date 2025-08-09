<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'name',
        'username',
        'gender',
        'password',
        'role',
        'umkm_id',
        'status',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id', 'id');
    }

    public function createdTransactions()
    {
        return $this->hasMany(Transaction::class, 'created_by', 'id');
    }
}
