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

use Illuminate\Support\Facades\Cache;
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
     * Return all cached permissions.
     */
    public static function allCached()
    {
        return Cache::rememberForever('laralum_permissions', function () {
            return Permission::all();
        });
    }

    /**
     * Checks if the permisions exists and if they dont, they will be added.
     *
     * @param array $permissions
     */
    public static function check($permissions)
    {
        foreach ($permissions as $permission) {
            if (!self::allCached()->contains('slug', $permission['slug'])) {
                Permission::create([
                    'name'        => $permission['name'],
                    'slug'        => $permission['slug'],
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
     * @param string $slug
     *
     * @return bool
     */
    public static function isMandatory($slug)
    {
        return collect(static::mandatory())->contains('slug', $slug);
    }
}
