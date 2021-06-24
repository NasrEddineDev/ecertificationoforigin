<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\Traits\LogsActivity;

class RolePermission extends Pivot
{
    // use HasFactory;
    use LogsActivity;
    protected static $logName = 'rolepermission';
    static $logFillable = true;
    public $incrementing = true;
    protected $fillable = [
        'role_id', 
        'permission_id'
    ];
}
