<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Itinerary
 *
 * @property int $id
 * @property int $trip_id
 * @property int $day
 * @property string $day_title
 * @property int $day_max_altitude
 * @property string $day_body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Trip $trip
 * @method static \Database\Factories\ItineraryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereDayBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereDayMaxAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereDayTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereTripId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itinerary whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Itinerary extends Model
{
    use HasFactory;

    public function trip()
    {
       return $this->belongsTo(Trip::class);
    }

    public function max_alt_ft()
    {
        return round($this->day_max_altitude * 3.2);
    }
}
