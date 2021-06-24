<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Request extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'request';
    static $logFillable = true;
    protected $fillable = [
        'number', 
        'title', 
        'description',
        'message',
        'status',
        'type',
        'user_id',
        'enterprise_id',
        'certificate_id'
    ];
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }    
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
