<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'permission';
    static $logFillable = true;
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions', 'role_id', 'permission_id')
        ->using(RolePermission::class);
    }
}
