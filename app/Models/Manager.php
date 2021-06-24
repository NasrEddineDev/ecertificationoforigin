<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Manager extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'manager';
    static $logFillable = true;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'gender',
        'address',
        'email',
        'mobile',
        'tel',
        'city_id',
    ];

    public function enterprise()
    {
        return $this->hasOne(Enterprise::class);
    }
    public function city()
    {
        return $this->belongsTo(AlgeriaCity::class);
    }
}
