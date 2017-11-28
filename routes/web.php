<?php

/*
 * Page Routes
 */
Route::get('/', 'Web\SiteController@getMap');
Route::get('/home', 'HomeController@index')->name('home');

/*
 * User Routes
 */
Route::get('/@{username}', 'Web\Users\UserController@show')->name('profile');
Route::resource('users', 'Web\Users\UserController');
Route::get('/profiles/{username}', function ($username) {
    return redirect('/@'.$username);
});
Route::get('/users/{username}', function ($username) {
    return redirect('/@'.$username);
});
Route::get('/public-api/users', 'Api\Users\UserController@index');
Route::get('/profiles/{user}/notifications', 'Web\Forums\UserNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}', 'Web\Forums\UserNotificationsController@destroy');

/*
 * Auth Routes
 */
Auth::routes();
Route::get('/auth/social/github', 'Auth\SocialController@redirectToGithub');
Route::get('/auth/social/callback/github', 'Auth\SocialController@handleGithubCallback');
Route::get('/auth/callback', function () {

});

Route::get('/confirm/{token}', function ($token) {
    $user = \App\Models\User::whereConfirmationToken($token)->firstOrFail();

    $user->confirmed_at = now();
    $user->confirmation_token = null;
    $user->save();

    return view('auth.confirmed');
});

Route::get('/test/{id}', function ($id) {
    $user = \App\Models\User::find($id);
    auth()->login($user);

    back();
});

/*
 * Forum Routes
 */
Route::get('threads', 'Web\Forums\ThreadsController@index')->name('threads');
Route::get('threads/create', 'Web\Forums\ThreadsController@create');
Route::post('threads/search', 'Web\Forums\SearchController@show');
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

/*
 * Link Routes
 */
Route::resource('links', 'Web\Links\LinkController');
Route::resource('link-categories', 'Web\Links\LinkCategoryController');

/*
 * Meetup Routes
 */
Route::resource('meetups', 'Web\Meetups\MeetupController');

/*
 * Job Routes
 */
Route::resource('jobs', 'Web\Jobs\JobController');
Route::resource('job-category', 'Web\Jobs\JobCategoryController');

/*
 * Discount Routes
 */
Route::resource('discounts', 'Web\Discounts\DiscountController');

/*
 * Stripe Routes
 */
Route::post('stripe/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');

/*
 * Newsletter Routes
 */
Route::post('newsletter/subscribe', 'Web\Newsletter\NewsletterController@subscribe');
Route::post('newsletter/unsubscribe', 'Web\Newsletter\NewsletterController@unsubscribe');

/*
 * Sponsor Routes
 */
Route::post('sponsors/donate', 'Web\Sponsors\DonationController@donate');