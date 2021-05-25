<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions', 'role_id', 'permission_id')
        ->using(RolePermission::class);
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->attach($permission->id);
    }

    public function romvePermissionTo(Permission $permission)
    {
        return $this->permissions()->detach($permission->id);
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param  Permission $permission
     * @return boolean
     */
    public function hasPermission(Permission $permission)
    {
      if (!isset($permission)) return false;
          return $this->permissions->contains('name', $permission->name);
    }

    /**
     * Determine if the role has the given permission.
     *
     * @param  mixed $permission
     * @return boolean
     */
    public function inRole($permission)
    {
      if (is_string($permission)) {
          return $this->permissions->contains('name', $permission);
      }
      return !! $permission->intersect($this->permissions)->count();
    }
}
