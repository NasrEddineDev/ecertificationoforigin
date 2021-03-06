<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Message extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'message';
    static $logFillable = true;

    protected $fillable = [
        'from',
        'to',
        'subject',
        'body',
        'type',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_messages', 'user_id', 'message_id')
        ->using(UserMessage::class)
        ->withTimestamps();
    }
}
