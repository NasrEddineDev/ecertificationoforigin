<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Invoice extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'invoice';
    static $logFillable = true;
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }
}
