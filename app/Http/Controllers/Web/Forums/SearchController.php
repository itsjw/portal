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
        $threads = Thread::search(request('q'))->paginate(25);

        if (request()->expectsJson()) {
            return $threads;
        }

        return view('threads.index', [
            'threads'  => $threads,
            'trending' => $trending->get(),
        ]);
    }
}
