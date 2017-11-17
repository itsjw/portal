<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @return mixed
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * @return mixed
     */
    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/social/github');
        }

        $authUser = $this->findOrCreateGithubUser($user);
        Auth::login($authUser, true);

        return Redirect::to('/home');
    }

    /**
     * @param $socialUser
     * @return mixed
     */
    private function findOrCreateGithubUser($socialUser)
    {
        if ($authUser = User::where('github_id', $socialUser->id)->first()) {
            return $authUser;
        }

        if ($authUser = User::where('username', $socialUser->nickname)->first()) {
            return $authUser;
        }

        if ($authUser = User::where('email', $socialUser->email)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $socialUser->name,
            'username' => str_slug($socialUser->nickname, '_'),
            'email' => $socialUser->email,
            'github_id' => $socialUser->id,
            'github_url' => 'https://github.com/'.$socialUser->nickname,
            'avatar_path' => $socialUser->avatar,
            'affiliate_id' => str_random(10),
            'is_verified' => false,
            'confirmation_token' => str_random(64),
            'password' => bcrypt(str_random(12))
        ]);
    }
}