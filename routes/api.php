<?php

/*
 * User Routes
 */
Route::get('users/profile-feed', 'Api\Users\ProfileFeedController@fetchFeed');
Route::apiResource('users', 'Api\Users\UserController');
Route::post('users/{user}/avatar', 'Api\Users\UserAvatarController@store')->name('avatar');

/*
 * Job Routes
 */
Route::apiResource('jobs', 'Api\Jobs\JobController');

/*
 * Meetup Routes
 */
Route::apiResource('meetups', 'Api\Meetups\MeetupController');

/*
 * Link Routes
 */
Route::apiResource('links', 'Api\Links\LinkController');
Route::apiResource('link-categories', 'Api\Links\LinkCategoryController');

/*
 * Discount Routes
 */
Route::apiResource('discounts', 'Api\Discounts\DiscountController');
