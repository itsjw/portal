<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * UserPolicy constructor.
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
     * @return bool
     */
    public function store(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param User $updated
     * @return bool
     */
    public function update(User $user, User $updated)
    {
        return $user->id === $updated->id;
    }

    /**
     * @param User $user
     * @param User $updated
     * @return bool
     */
    public function delete(User $user, User $updated)
    {
        return $user->id === $updated->id;
    }
}
