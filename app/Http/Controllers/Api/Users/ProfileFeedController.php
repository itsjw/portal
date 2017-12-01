<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Resources\ProfileFeedResource;
use App\Models\FeedItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
