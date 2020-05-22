<?php

namespace App\Traits;

use App\Permission;
use App\Role;

Trait RolePermission
{

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