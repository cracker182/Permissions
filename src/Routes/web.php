<?php

Route::group([
        'middleware' => [
            'web', 'laralum.base', 'laralum.auth',
            'can:access,Laralum\Permissions\Models\Permission',
        ],
        'prefix' => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\Permissions\Controllers',

        'as' => 'laralum::'
    ], function () {
        // First the suplementor, then the resource
        // https://laravel.com/docs/5.4/controllers#resource-controllers
        Route::get('permissions/{permission}/delete', 'PermissionController@confirmDelete')->name('permissions.destroy.confirm');
        Route::resource('permissions', 'PermissionController', ['except' => ['show']]);
});
