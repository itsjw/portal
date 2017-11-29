<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFollowers(Request $request)
    {
        $followers = $request->user()->followees();

        return response()->json([
            'followers' => $followers,
        ], 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function followUser(Request $request)
    {
        $followed = $request->user()->follow($request->get('follow_id'));

        return response()->json([
            'followed' => $followed,
        ], 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unfollowUser(Request $request)
    {
        $unfollowed = $request->user()->unfollow($request->get('follow_id'));

        return response()->json([
            'followed' => $unfollowed,
        ], 200);
    }
}
