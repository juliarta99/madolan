<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    protected $fillable = [
        'type_id',
        'created_by',
        'name_funder',
        'logo_funder',
        'start_nominal',
        'end_nominal',
        'interest_rate',
        'tenor',
        'age_requirements',
        'turnover_requirements',
        'link_funding',
        'status',
    ];

    public function type()
    {
        return $this->belongsTo(FundingType::class, 'type_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function fundingOtherConditions()
    {
        return $this->hasMany(FundingOtherCondition::class, 'funding_id');
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'funding_reports', 'funding_id', 'report_id');
    }
}
