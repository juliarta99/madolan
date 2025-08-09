<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
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

    public function fundingReports()
    {
        return $this->hasMany(FundingReport::class, 'report_id');
    }

    public function fundings()
    {
        return $this->belongsToMany(Funding::class, 'funding_reports', 'report_id', 'funding_id');
    }
}
