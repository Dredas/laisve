<?php

Route::get('/', 'MapController@show');
Route::get('/votes', 'MapController@votes');
Route::get('/rating', 'MapController@rating');
