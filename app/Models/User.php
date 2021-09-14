<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes, LogsActivity, CausesActivity;
    static $logFillable = true;
    protected static $logName = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'profile_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function enterprise()
    {
        return $this->hasOne(Enterprise::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // public function notifications()
    // {
    //     return Notification::all()->where('notifiable_id', 10);
    //     // return $this->belongsToMany(Notification::class, 'users_notifications', 'user_id', 'notification_id')
    //     // ->using(UserNotification::class)
    //     // ->withTimestamps();
    // }
    
    public function messages()
    {
        return $this->belongsToMany(Message::class, 'users_messages', 'user_id', 'message_id')
        ->using(UserMessage::class)
        ->withTimestamps();
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
