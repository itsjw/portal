<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LinkCategory
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Link[] $links
 */
class LinkCategory extends Model
{
    protected $fillable = [
        'title', 'slug'
    ];

    /**
     * @var array
     */
    protected $with = [
        'links'
    ];

    /**
     * @var array
     */
    protected $withCount = [
        'links'
    ];

    public function links()
    {
        return $this->hasMany(Link::class, 'link_category_id', 'id');
    }
}
