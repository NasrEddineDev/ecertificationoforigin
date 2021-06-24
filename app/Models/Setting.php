<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'setting';
    static $logFillable = true;
    protected $fillable = ['name', 'value'];
}
