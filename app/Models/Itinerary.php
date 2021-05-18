<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
