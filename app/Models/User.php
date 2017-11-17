<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_path', 'confirmation_token', 'username', 'profile_cover', 'github_id', 'is_admin', 'lat', 'lng', 'address', 'city', 'country', 'company', 'intro', 'website', 'github_url', 'twitter_url', 'facebook_url', 'linkedin_url', 'affiliate_id', 'referred_by', 'is_verified', 'is_sponsor',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'confirmation_token', 'github_id', 'affiliate_id', 'referred_by',
    ];

    /**
    * @var array
    */
    protected $casts = [
        'is_admin' => 'boolean',
        'is_verified' => 'boolean',
        'is_sponsor' => 'boolean',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    /**
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class)->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return in_array($this->username, ['fwartner']);
    }

    /**
     * @param $thread
     */
    public function read($thread)
    {
        cache()->forever(
            $this->visitedThreadCacheKey($thread),
            Carbon::now()
        );
    }

    /**
     * @param $avatar
     * @return string
     */
    public function getAvatarPathAttribute($avatar)
    {
        return asset($avatar ?: 'images/avatars/default.png');
    }

    /**
     * @param $thread
     * @return string
     */
    public function visitedThreadCacheKey($thread)
    {
        return sprintf("users.%s.visits.%s", $this->id, $thread->id);
    }

    /**
     * @return bool
     */
    public function canImpersonate()
    {
        return $this->is_admin == 1;
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        return $this->is_admin == 0;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetups()
    {
        return $this->hasMany(Meetup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendToMeetups()
    {
        return static::meetups();
    }
}
