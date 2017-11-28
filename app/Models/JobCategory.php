<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class JobCategory extends Model
{
    use Searchable;

    protected $fillable = [
        'title', 'slug'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_category_id', 'id');
    }
}
