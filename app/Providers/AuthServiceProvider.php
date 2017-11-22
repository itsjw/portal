<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Thread'     => 'App\Policies\Forums\ThreadPolicy',
        'App\Models\Reply'      => 'App\Policies\Forums\ReplyPolicy',
        'App\Models\User'       => 'App\Policies\UserPolicy',
        'App\Models\Job'        => 'App\Policies\JobPolicy',
        'App\Models\Link'       => 'App\Policies\LinkPolicy',
        'App\Models\Meetup'     => 'App\Policies\MeetupPolicy',
        'App\Models\Discount'   => 'App\Policies\DiscountPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::enableImplicitGrant();
    }
}
