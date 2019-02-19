<?php

namespace Shortcodes\Roles\Traits;


use Shortcodes\Roles\Models\Role;

trait UserAccess
{
    public function is($role)
    {
        if ($this->roles()->whereName($role)->first()) {
            return true;
        }

        return false;
    }

    public function addRole($role)
    {
        $roleObject = Role::whereName($role)->first();

        if (!$roleObject) {
            return;
        }

        $this->roles()->attach($roleObject->id);
    }

    public function removeRole($role)
    {
        $roleObject = Role::whereName($role)->first();

        if (!$roleObject) {
            return;
        }

        $this->roles()->detach($roleObject->id);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }
}
