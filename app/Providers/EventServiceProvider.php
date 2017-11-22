<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Laravel\Passport\Events\AccessTokenCreated' => [
            'App\Listeners\Passport\RevokeOldTokens',
        ],

        'Laravel\Passport\Events\RefreshTokenCreated' => [
            'App\Listeners\Passport\PruneOldTokens',
        ],

        'App\Events\Forums\ThreadReceivedNewReply' => [
            'App\Listeners\Forums\NotifyMentionedUsers',
            'App\Listeners\Forums\NotifySubscribers',
        ],

        /*
         * API Events
         */
        'App\Events\Api\Users\UserCreated' => [
            'App\Listeners\Api\Users\SendPasswordResetMail',
            'App\Listeners\Api\Users\SendWelcomeMail',
        ],

        'App\Events\Api\Users\UserUpdated' => [
            'App\Listeners\Api\Users\SendUpdatedEmail',
            'App\Listeners\Api\Users\SendUpdatedNotification',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
