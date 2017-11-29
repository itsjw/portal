<?php

namespace App\Http\Controllers\Web\Forums;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\Trending;

class SearchController extends Controller
{
    /**
     * Show the search results.
     *
     * @param \App\Models\Trending $trending
     *
     * @return mixed
     */
    public function show(Trending $trending)
    {
        if (request()->expectsJson()) {
            return Thread::search(request('q'))->paginate(25);
        }

        return view('threads.search', [
            'trending' => $trending->get()
        ]);
    }
}
