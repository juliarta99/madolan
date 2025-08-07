<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundingOtherCondition extends Model
{
    protected $fillable = [
        'funding_id',
        'requirement',
    ];

    public function funding()
    {
        return $this->belongsTo(Funding::class, 'funding_id');
    }
}
