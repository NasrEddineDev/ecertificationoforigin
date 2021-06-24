<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Document extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'document';
    static $logFillable = true;
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }
}
