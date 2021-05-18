<?php

namespace Database\Seeders;

// use App\Models\Itinerary;

use App\Models\Itinerary;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(2)->create();
        // \App\Models\Trip::factory(10)->create();
        // \App\Models\Itinerary::factory(1)->itinerary->create();
        // \App\Models\Itinerary::factory(1)->create();
        
        function add_n_itineraries($n)
        {
            for ($i = 2; $i < $n; $i++) {
                \App\Models\Itinerary::factory(1)->create([
                    'trip_id' => 1,
                    'day'     => $i,
                ]);
            }
        }
        add_n_itineraries(10);
    }
}
