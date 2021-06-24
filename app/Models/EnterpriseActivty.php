<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\Traits\LogsActivity;

class EnterpriseActivity extends Pivot
{
    // use HasFactory;
    use LogsActivity;
    protected static $logName = 'enterpriseactivity';
    static $logFillable = true;
    public $incrementing = true;
    protected $fillable = [
        'enterprise_id', 
        'activity_id'
    ];
}
