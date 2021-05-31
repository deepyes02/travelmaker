<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Trip
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string $difficulty
 * @property int $max_altitude_mtr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Itinerary[] $itinerary
 * @property-read int|null $itinerary_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TripFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip newQuery()
 * @method static \Illuminate\Database\Query\Builder|Trip onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereDifficulty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereMaxAltitudeMtr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Trip withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Trip withoutTrashed()
 * @mixin \Eloquent
 */
class Trip extends Model
{
    use HasFactory, SoftDeletes;

    public function itinerary()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     /**
     * Convert and echo SQL TimeStamp into date format
     */
    public function convertDate ($timestamp)
    {
        $phpdate = strtotime( $timestamp );
        $humanReadableDate = date("Y-m-d", $phpdate);
        return __($humanReadableDate);
    }

}