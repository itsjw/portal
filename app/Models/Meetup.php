<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Meetup extends Model
{
    use Searchable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'shortname', 'url', 'icalendar_url', 'latitude', 'longitude', 'state', 'country', 'slug',
    ];

    /**
     * @var array
     */
    protected $with = [
        'attendees'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendees()
    {
        return $this->hasMany(User::class);
    }
}
