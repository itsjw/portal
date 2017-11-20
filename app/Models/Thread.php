<?php

namespace App\Models;

use App\Events\Forums\ThreadReceivedNewReply;
use App\Filters\ThreadFilters;
use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\Models\Thread.
 *
 * @property int $id
 * @property string|null $slug
 * @property int $user_id
 * @property int $channel_id
 * @property int $replies_count
 * @property int $visits
 * @property string $title
 * @property string $body
 * @property int|null $best_reply_id
 * @property bool $locked
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read \App\Models\Channel $channel
 * @property-read \App\Models\User $creator
 * @property-read bool $is_subscribed_to
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reply[] $replies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ThreadSubscription[] $subscriptions
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread filter(\App\Filters\ThreadFilters $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereBestReplyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereRepliesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereVisits($value)
 * @mixin \Eloquent
 */
class Thread extends Model
{
    use Searchable, RecordsActivity;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $with = ['creator', 'channel'];

    /**
     * @var array
     */
    protected $appends = ['isSubscribedTo'];

    /**
     * @var array
     */
    protected $casts = [
        'locked' => 'boolean',
    ];

    /**
     *  Boot Model.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($thread) {
            $thread->replies->each->delete();
        });

        static::created(function ($thread) {
            $thread->update(['slug' => $thread->title]);
        });
    }

    /**
     * @return string
     */
    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->slug}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function addReply($reply)
    {
        $reply = $this->replies()->create($reply);

        event(new ThreadReceivedNewReply($reply));

        return $reply;
    }

    public function scopeFilter($query, ThreadFilters $filters)
    {
        return $filters->apply($query);
    }

    /**
     * @param null $userId
     *
     * @return $this
     */
    public function subscribe($userId = null)
    {
        $this->subscriptions()->create([
            'user_id' => $userId ?: auth()->id(),
        ]);

        return $this;
    }

    /**
     * @param null $userId
     */
    public function unsubscribe($userId = null)
    {
        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())
            ->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(ThreadSubscription::class);
    }

    /**
     * @return bool
     */
    public function getIsSubscribedToAttribute()
    {
        return $this->subscriptions()
            ->where('user_id', auth()->id())
            ->exists();
    }

    /**
     * @param $user
     *
     * @return bool
     */
    public function hasUpdatesFor($user)
    {
        $key = $user->visitedThreadCacheKey($this);

        return $this->updated_at > cache($key);
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * @param Reply $reply
     */
    public function markBestReply(Reply $reply)
    {
        $this->update(['best_reply_id' => $reply->id]);
    }
}
