<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Profile extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected static $logName = 'profile';
    static $logFillable = true;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'gender',
        'position',
        'address',
        'mobile',
        'signature',
        'square_stamp',
        'round_stamp',
        'agce_user_id',
        'city_id',
        'picture',
        'language',
        'theme',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function city()
    {
        return $this->belongsTo(AlgeriaCity::class);
    }
}
