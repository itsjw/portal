<?php

namespace App\Policies;

use App\Models\Meetup;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeetupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param $user
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Meetup $meetup
     * @return bool
     */
    public function update(User $user, Meetup $meetup)
    {
        return $user->id === $meetup->user_id;
    }

    /**
     * @param User $user
     * @param Meetup $meetup
     * @return bool
     */
    public function delete(User $user, Meetup $meetup)
    {
        return $user->id === $meetup->user_id;
    }
}
