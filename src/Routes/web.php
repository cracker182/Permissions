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
        Route::get('permissions/{permission}/delete', 'PermissionController@confirmDelete')->name('permissions.destroy.confirm');
        Route::resource('permissions', 'PermissionController', ['except' => ['show']]);
});
