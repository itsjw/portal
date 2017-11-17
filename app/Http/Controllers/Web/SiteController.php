<?php

namespace App\Http\Controllers\Web;

use App\Models\Meetup;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMap()
    {
        $users = User::all();
        $usergroups = Meetup::all();

        return view('welcome', compact('users', 'usergroups'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
        $sponsors = User::where('is_sponsor', 1)->get();
        return view('pages.about', compact('sponsors'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getImprint()
    {
        return view('pages.imprint');
    }
}
