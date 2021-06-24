<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CustomsTariff extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'customstariff';
    static $logFillable = true;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
