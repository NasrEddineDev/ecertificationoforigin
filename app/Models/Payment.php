<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'payment';
    static $logFillable = true;
    protected $fillable = [
        'type',
        'mode',
        'status',
        'amount',
        'date',
        'order_id',
        'description',
        'document',
        'enterprise_id',
    ];

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
