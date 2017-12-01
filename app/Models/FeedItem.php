<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedItem extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'subject',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function subject()
    {
        return $this->morphTo();
    }

    /**
     * @param $user
     * @param int $take
     *
     * @return mixed
     */
    public static function feed($user, $take = 50)
    {
        return static::where('user_id', $user->id)
            ->latest()
            ->with('subject', '')
            ->take($take)
            ->get()
            ->groupBy(function ($activity) {
                return $activity->created_at->format('Y-m-d');
            });
    }

    /**
     * @param $user
     * @param int $take
     *
     * @return mixed
     */
    public static function forUser($user, $take = 50)
    {
        return static::where('user_id', $user->id)
            ->latest()
            ->take($take)
            ->get()
            ->groupBy(function ($feed) {
                return $feed->created_at->format('Y-m-d');
            });
    }
}
