<?php

/*
 * This file is part of Laralum Dashboard.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Laralum\Permissions;

use Illuminate\Support\Facades\Facade;
use Laralum\Permissions\Models\Permission;

/**
 * This is the PermissionCheck facade class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class PermissionsChecker extends Facade
{
    /**
     * Checks if the permisions exists and if they dont, they will be added.
     *
     * @param array $permissions
     */
    public static function check($permissions)
    {
        [[ITEM],[ITEM],[ITEM]]
        foreach ($permissions as $permission) {
            $perm = Permission::where(['slug' => $permission['slug']])->first();
            if (!$perm) {
                Permission::create([
                    'name' => $permission['name'],
                    'slug' => $permission['slug'],
                    'description' => $permission['desc'],
                ]);
            }
        }

        session(['laralum_permissions::mandatory' => array_merge(static::mandatory(), $permissions)]);
    }

    /**
     * Returns the mandatory stored permissions so far. Not recommended.
     *
     * @return array
     */
    public static function mandatory()
    {
        $permission = session('laralum_permissions::mandatory');
        return $permission ? $permission : [];
    }

    /**
     * Returns the if the permission is stored as mandatory. Not recommended.
     *
     * @return bool
     */
    public static function isMandatory($slug)
    {
        return collect(static::mandatory())->contains('slug', $slug);
    }
}
