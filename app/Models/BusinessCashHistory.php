<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCashHistory extends Model
{
    protected $fillable = [
        'transaction_id',
        'umkm_id',
        'type',
        'before_business_cash',
        'cash',
        'business_cash',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}
