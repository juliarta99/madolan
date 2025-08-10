<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class FundingType extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
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

    public function fundings()
    {
        return $this->hasMany(Funding::class, 'type_id');
    }
}
