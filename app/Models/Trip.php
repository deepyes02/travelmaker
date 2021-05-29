<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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