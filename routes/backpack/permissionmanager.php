<?php

Route::group([
    'namespace'  => 'Backpack\PermissionManager\app\Http\Controllers',
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'superadmin'],
], function () {
    Route::crud('permission', 'PermissionCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('user', 'UserCrudController');
});
