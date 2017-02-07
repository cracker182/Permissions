<?php

namespace Laralum\Permissions;

use Illuminate\Support\ServiceProvider;
use Laralum\Laralum\Menu;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'permissions');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
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