<?php

namespace App\Listeners\Api\Users;

use App\Events\Api\Users\UserUpdated;

class SendUpdatedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param UserUpdated $event
     *
     * @return void
     */
    public function handle(UserUpdated $event)
    {
        //
    }
}
