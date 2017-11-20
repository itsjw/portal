<?php

namespace App\Http\Controllers\Web\Forums;

use App\Http\Controllers\Controller;
use App\Models\Thread;

class LockedThreadsController extends Controller
{
    /**
     * Lock the given thread.
     *
     * @param \App\Models\Thread $thread
     */
    public function store(Thread $thread)
    {
        $thread->update(['locked' => true]);
    }

    /**
     * Unlock the given thread.
     *
     * @param \App\Models\Thread $thread
     */
    public function destroy(Thread $thread)
    {
        $thread->update(['locked' => false]);
    }
}
