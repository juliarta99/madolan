<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundingReport extends Model
{
    protected $fillable = [
        'funding_id',
        'report_id',
    ];

    public function funding()
    {
        return $this->belongsTo(Funding::class, 'funding_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
