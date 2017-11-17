<?php

namespace App\Http\Controllers\Web\Forums;

use App\Models\Reply;
use App\Http\Controllers\Controller;

class FavoritesController extends Controller
{
    /**
     * Store a new favorite in the database.
     *
     * @param  Reply $reply
     */
    public function store(Reply $reply)
    {
        $reply->favorite();
    }

    /**
     * Delete the favorite.
     *
     * @param Reply $reply
     */
    public function destroy(Reply $reply)
    {
        $reply->unfavorite();
    }
}