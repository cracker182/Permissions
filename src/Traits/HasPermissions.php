<?php

namespace Laralum\Permissions\Traits;

use Laralum\Permissions\Models\Permission;

trait HasPermissions
{
    /**
     * Return all the role permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'laralum_permission_role');
    }

    /**
    * Returns if the user has a permission.
    *
    * @param mixed $permision
    * @return bool
    */
    public function hasPermission($permission)
    {
        $permission = !is_string($permission) ?: Permission::where(['slug' => $permission])->first();

        if ($permission) {
            foreach ($this->permissions as $p) {
                if ($p->id == $permission->id) {
                    return true;
                }
            }
        }

        return false;
    }
}
