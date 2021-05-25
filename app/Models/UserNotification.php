<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserNotification extends Pivot
{
    // use HasFactory;
    public $incrementing = true;
    protected $fillable = [
        'user_id', 
        'notificaion_id'
    ];
}
