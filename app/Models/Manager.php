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
        'firstname_ar',
        'firstname',
        'lastname_ar',
        'lastname',
        'email',
        'mobile',
        'tel',
        'address_ar',
        'address',
        'city_id',
        'birthday',
        'gender',
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
