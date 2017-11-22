<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
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
     * @param Link $link
     * @return bool
     */
    public function update(User $user, Link $link)
    {
        return $user->id === $link->user_id;
    }

    /**
     * @param User $user
     * @param Link $link
     * @return bool
     */
    public function delete(User $user, Link $link)
    {
        return $user->id === $link->user_id;
    }
}
