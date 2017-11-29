<?php

namespace App\Http\Controllers\Web\Users;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param $username
     *
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        return view('users.show', [
            'user'        => $user,
            'activities'  => Activity::feed($user),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $username
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::where('username', $username)->first();

        return view('users.edit', [
            'user'        => $user,
            'activities'  => Activity::feed($user),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $username
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        $this->authorize('update', $user);

        $updated = $user->update([
            'name'               => $request->get('name'),
            'email'              => $request->get('email'),
            'username'           => str_slug($request->get('username'), '_'),
            'lat'                => $request->get('lat'),
            'lng'                => $request->get('lng'),
            'city'               => $request->get('city'),
            'country'            => $request->get('country'),
            'affiliate_id'       => str_random(10),
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $username
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $user = User::where('username', $username)->first();

        $user->delete();

        return back();
    }
}
