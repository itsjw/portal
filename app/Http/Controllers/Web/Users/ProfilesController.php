<?php

namespace App\Http\Controllers\Web\Users;

use App\Models\Activity;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @param $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        return view('profiles.show', [
            'profileUser' => $user,
            'activities' => Activity::feed($user)
        ]);
    }
}
