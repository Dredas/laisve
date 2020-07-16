<?php

use Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController;
use Backpack\PermissionManager\app\Http\Controllers\RoleCrudController;

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    Route::get('map', 'MapController@show');
    Route::get('map/{id}', 'MapController@districts');
});
