<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'notifiable',
        'data',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_notifications', 'user_id', 'notification_id')
        ->using(UserNotification::class)
        ->withTimestamps();
    }
}
