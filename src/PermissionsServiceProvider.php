<?php

namespace Laralum\Permissions;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laralum\Permissions\Models\Permission;
use Laralum\Permissions\Policies\PermissionPolicy;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Permission::class => PermissionPolicy::class,
    ];

    /**
     * The mandatory permissions for the module.
     *
     * @var array
     */
    protected $permissions = [
        [
            'name' => 'Permissions Access',
            'slug' => 'laralum::permissions.access',
            'desc' => 'Grants access to laralum/permissions module',
        ],
        [
            'name' => 'Create Permissions',
            'slug' => 'laralum::permissions.create',
            'desc' => 'Allows creating permissions',
        ],
        [
            'name' => 'Update Permissions',
            'slug' => 'laralum::permissions.update',
            'desc' => 'Allows updating permissions',
        ],
        [
            'name' => 'Delete Permissions',
            'slug' => 'laralum::permissions.delete',
            'desc' => 'Allows delete permissions',
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->loadViewsFrom(__DIR__.'/Views', 'laralum_permissions');
        $this->loadTranslationsFrom(__DIR__.'/Translations', 'laralum_permissions');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // Make sure the permissions are OK
        PermissionsChecker::check($this->permissions);
    }

    /**
     * I cheated this comes from the AuthServiceProvider extended by the App\Providers\AuthServiceProvider.
     *
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
