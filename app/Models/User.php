<?php

namespace App\Models;

use App\Traits\Followable;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;
use Laravel\Cashier\Billable;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $confirmed_at
 * @property string|null $confirmation_token
 * @property string $username
 * @property string $avatar_path
 * @property string $profile_cover
 * @property bool $is_admin
 * @property bool $is_verified
 * @property bool $is_sponsor
 * @property string|null $github_id
 * @property string|null $lat
 * @property string|null $lng
 * @property string|null $address
 * @property string|null $city
 * @property string|null $country
 * @property string|null $referred_by
 * @property string $affiliate_id
 * @property string|null $company
 * @property string|null $website
 * @property string|null $github_url
 * @property string|null $twitter_url
 * @property string|null $facebook_url
 * @property string|null $linkedin_url
 * @property string|null $intro
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \App\Models\Reply $lastReply
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meetup[] $meetups
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $threads
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAffiliateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereConfirmationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGithubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGithubUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsSponsor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLinkedinUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProfileCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereReferredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereTwitterUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWebsite($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, Searchable, Billable, Followable;

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
        'is_admin'    => 'boolean',
        'is_verified' => 'boolean',
        'is_sponsor'  => 'boolean',
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
     *
     * @return string
     */
    public function getAvatarPathAttribute($avatar)
    {
        return asset($avatar ?: 'images/avatars/default.png');
    }

    /**
     * @param $thread
     *
     * @return string
     */
    public function visitedThreadCacheKey($thread)
    {
        return sprintf('users.%s.visits.%s', $this->id, $thread->id);
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
    public function links()
    {
        return $this->hasMany(Link::class, 'user_id', 'id');
    }
}
