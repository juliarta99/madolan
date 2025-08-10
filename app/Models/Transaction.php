<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'code',
        'umkm_id',
        'category_id',
        'order_type',
        'transaction_date',
        'customer_name',
        'description',
        'grand_total',
        'amount_paid',
        'payment',
        'is_paid',
        'pickup_date',
        'paid_at',
        'payment_proof',
        'created_by',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }

    public function category()
    {
        return $this->belongsTo(TransactionCategory::class, 'category_id');
    }

    public function creator()
    {
        return $this->belongsTo(Employer::class, 'created_by');
    }

    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id');
    }

    public function businessCashHistories()
    {
        return $this->hasMany(BusinessCashHistory::class, 'transaction_id');
    }
}
