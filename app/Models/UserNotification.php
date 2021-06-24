<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\Traits\LogsActivity;

class UserNotification extends Pivot
{
    // use HasFactory;
    use LogsActivity;
    protected static $logName = 'usernotification';
    static $logFillable = true;
    public $incrementing = true;
    protected $fillable = [
        'user_id', 
        'notificaion_id'
    ];
}
