<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    // use HasFactory;
    public $incrementing = true;
    protected $fillable = [
        'role_id', 
        'permission_id'
    ];
}
