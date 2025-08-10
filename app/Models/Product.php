<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id',
        'umkm_id',
        'name',
        'barcode',
        'slug',
        'price',
        'image',
        'unit',
        'is_unlimited',
        'stock',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_unlimited' => 'boolean',
        'status' => 'boolean'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'maxLength' => 100
            ]
        ];
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class, 'product_id');
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Aktif' : 'Tidak Aktif';
    }

    public function getStockDisplayAttribute()
    {
        return $this->is_unlimited ? 'Unlimited' : $this->stock . ' ' . $this->unit;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeByUmkm($query, $umkmId)
    {
        return $query->where('umkm_id', $umkmId);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('barcode', 'like', '%' . $search . '%');
        });
    }

    public function scopeLowStock($query, $threshold = 5)
    {
        return $query->where('is_unlimited', 0)
                    ->where('stock', '<=', $threshold);
    }
}