<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * @param Request $request
     *
     * @return static
     */
    public function createSubscription(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->newSubscription('main', $request->get('plan'))->create($request->get('stripeToken'), [
            'email' => $request->get('email'),
        ]);

        return UserResource::make($user);
    }

    /**
     * @return static
     */
    public function cancelSubscription()
    {
        $user = User::find(auth()->user()->id);

        $user->subscription('main')->cancelNow();

        return UserResource::make($user);
    }

    /**
     * @param Request $request
     *
     * @return static
     */
    public function updateCard(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->updateCard($request->get('stripeToken'));

        return UserResource::make($user);
    }
}
