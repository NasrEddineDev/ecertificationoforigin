<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class City extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'city';
    static $logFillable = true;
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
