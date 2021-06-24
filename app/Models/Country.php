<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Country extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'country';
    static $logFillable = true;
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
