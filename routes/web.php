<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Web\SiteController@getMap');

Auth::routes();
Route::get('/auth/social/github', 'Auth\SocialController@redirectToGithub');
Route::get('/auth/social/callback/github', 'Auth\SocialController@handleGithubCallback');

Route::get('/test/{id}', function ($id) {
    $user = \App\Models\User::find($id);
    auth()->login($user);
});

Route::get('/confirm/{token}', function ($token) {
    $user = \App\Models\User::whereConfirmationToken($token)->firstOrFail();
    $user->confirmed_at = now();
    $user->confirmation_token = null;
    $user->save();
    return view('auth.confirmed');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/public-api/users', 'Api\Users\UserController@index');

/*
 * Forum Routes
 */
Route::get('threads', 'Web\Forums\ThreadsController@index')->name('threads');
Route::get('threads/create', 'Web\Forums\ThreadsController@create');
Route::get('threads/search', 'Web\Forums\SearchController@show');
Route::get('threads/{channel}/{thread}', 'Web\Forums\ThreadsController@show');
Route::patch('threads/{channel}/{thread}', 'Web\Forums\ThreadsController@update');
Route::delete('threads/{channel}/{thread}', 'Web\Forums\ThreadsController@destroy');
Route::post('threads', 'Web\Forums\ThreadsController@store')->middleware('auth');
Route::get('threads/{channel}', 'Web\Forums\ThreadsController@index');
Route::post('locked-threads/{thread}', 'Web\Forums\LockedThreadsController@store')->name('locked-threads.store')->middleware('admin');
Route::delete('locked-threads/{thread}', 'Web\Forums\LockedThreadsController@destroy')->name('locked-threads.destroy')->middleware('admin');
Route::get('/threads/{channel}/{thread}/replies', 'Web\Forums\RepliesController@index');
Route::post('/threads/{channel}/{thread}/replies', 'Web\Forums\RepliesController@store');
Route::patch('/replies/{reply}', 'Web\Forums\RepliesController@update');
Route::delete('/replies/{reply}', 'Web\Forums\RepliesController@destroy')->name('replies.destroy');
Route::post('/replies/{reply}/best', 'Web\Forums\BestRepliesController@store')->name('best-replies.store');
Route::post('/threads/{channel}/{thread}/subscriptions', 'Web\Forums\ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'Web\Forums\ThreadSubscriptionsController@destroy')->middleware('auth');
Route::post('/replies/{reply}/favorites', 'Web\Forums\FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'Web\Forums\FavoritesController@destroy');
Route::get('/@{user}', 'Web\Users\ProfilesController@show')->name('profile');
Route::get('/profiles/{user}/notifications', 'Web\Forums\UserNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}', 'Web\Forums\UserNotificationsController@destroy');
