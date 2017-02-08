<?php

Route::group([
        'middleware' => ['web', 'laralum.base', 'laralum.auth'],
        'prefix' => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\Permissions\Controllers',
        'as' => 'laralum::'
    ], function () {
        Route::resource('permissions', 'PermissionController');
        Route::get('permissions/{permission}/delete', 'PermissionController@confirmDelete')->name('permissions.delete.confirm');
});
