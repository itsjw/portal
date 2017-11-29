<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * App\Models\Link.
 *
 * @property int $id
 * @property int $user_id
 * @property int $link_category_id
 * @property string $title
 * @property string $url
 * @property string|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereLinkCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereUserId($value)
 * @mixin \Eloquent
 *
 * @property-read \App\Models\User $author
 * @property-read \App\Models\LinkCategory $category
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Link onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Link withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Link withoutTrashed()
 */
class Link extends Model
{
    use Searchable, SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'link_category_id', 'title', 'url',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(LinkCategory::class, 'link_category_id', 'id');
    }
}
