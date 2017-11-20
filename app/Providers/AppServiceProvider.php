<?php

namespace App\Providers;

use App\Models\Channel;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);

        View::composer('*', function ($view) {
            $channels = Cache::rememberForever('channels', function () {
                return Channel::orderBy('name')->get();
            });

            $view->with('channels', $channels);
        });

        Validator::extend('spamfree', 'App\Rules\SpamFree@passes');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register('\Laravel\Dusk\DuskServiceProvider');
            $this->app->register('\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
            $this->app->register('\Barryvdh\Debugbar\ServiceProvider');
        }
    }
}
