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
        foreach($permissions as $permission) {
            $perm = Permission::where(['slug' => $permission['slug']])->first();
            if (!$perm) {
                Permission::create([
                    'name' => $permission['name'],
                    'slug' => $permission['slug'],
                    'description' => $permission['desc'],
                ]);
            }
        }
    }
}
