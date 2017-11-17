<?php

Route::apiResource('users', 'Api\Users\UserController');

Route::post('users/{user}/avatar', 'Api\Users\UserAvatarController@store')->name('avatar');
