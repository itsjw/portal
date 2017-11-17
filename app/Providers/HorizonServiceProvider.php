<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;

class HorizonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Horizon::routeMailNotificationsTo(config('horizon.email'));
        Horizon::routeSlackNotificationsTo(config('horizon.slack_webhook_url'));
        Horizon::auth(function (Request $request) {
            if (app()->environment('local')) {
                return true;
            }

            $admin = auth()->user();

            if (! $admin->is_admin) {
                return false;
            }

            return ends_with($admin->email, '@phpmap.co');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
