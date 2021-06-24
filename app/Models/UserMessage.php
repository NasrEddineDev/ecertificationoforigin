<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\Traits\LogsActivity;

class UserMessage extends Pivot
{
    // use HasFactory;
    use LogsActivity;
    protected static $logName = 'usermessage';
    static $logFillable = true;
    public $incrementing = true;
    protected $fillable = [
        'user_id', 
        'message_id'
    ];
}
