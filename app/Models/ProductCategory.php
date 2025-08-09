<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use Sluggable;

    protected $fillable = [
        'umkm_id',
        'name',
        'slug',
        'type',
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

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
