<?php

namespace App\Traits;

use App\Permission;
use App\Role;

Trait RolePermission
{
    /**
     * users-permission (mengecek izin action dari user) & roles-permissions(mengecek izin action dari peran )
     */
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    //this from user
    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('name', $permission->name)->count();
    }

    //this from role
    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }  

    /**
     * users-role (mengecek peran seorang user)
     */
    public function hasRole(... $roles)
    {
        foreach ($roles as $role) 
        {
            if ($this->roles->contains('name', $role)) {
                return true;
            }   
        }

        return false;
    }

    /**
     * Many to many relationship users with roles and permissions table
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
}