<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\Models\Meetup
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 * @property string|null $url_name
 * @property string|null $description
 * @property string|null $city
 * @property string|null $country
 * @property string|null $localized_country_name
 * @property string|null $state
 * @property string|null $lat
 * @property string|null $lon
 * @property string|null $member_count
 * @property string|null $who
 * @property string|null $timezone
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $attendees
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereLocalizedCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereMemberCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereUrlName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meetup whereWho($value)
 * @mixin \Eloquent
 */
class Meetup extends Model
{
    use Searchable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'shortname', 'url', 'icalendar_url', 'latitude', 'longitude', 'state', 'country', 'slug',
    ];


}
