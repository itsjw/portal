<?php

namespace App\Http\Controllers\Api\Users;

use App\Events\Api\Users\UserCreated;
use App\Events\Api\Users\UserUpdated;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page') ?? '15';

        $users = User::paginate($perPage);

        return UserResource::collection($users);
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
        $user = new User();
        $this->authorize('store');

        $created = $user->create([
            'name'               => $request->get('name'),
            'email'              => $request->get('email'),
            'username'           => str_slug($request->get('username'), '_'),
            'confirmation_token' => str_random(64),
            'password'           => str_random(12),
            'lat'                => $request->get('lat'),
            'lng'                => $request->get('lng'),
            'city'               => $request->get('city'),
            'country'            => $request->get('country'),
            'affiliate_id'       => str_random(10),
        ]);

        event(new UserCreated($created));

        return UserResource::make($created);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

        $user->update([
            'name'               => $request->get('name'),
            'email'              => $request->get('email'),
            'username'           => str_slug($request->get('username'), '_'),
            'lat'                => $request->get('lat'),
            'lng'                => $request->get('lng'),
            'city'               => $request->get('city'),
            'country'            => $request->get('country'),
            'affiliate_id'       => str_random(10),
        ]);

        event(new UserUpdated($user));

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $this->authorize('delete', $user);

        $user->delete();

        return UserResource::make($user);
    }
}
