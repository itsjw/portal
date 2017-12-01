<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileFeedResource;
use App\Models\FeedItem;

class ProfileFeedController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function fetchFeed()
    {
        $feedItems = FeedItem::forUser(auth()->user()->id);

        return ProfileFeedResource::collection($feedItems);
    }
}
