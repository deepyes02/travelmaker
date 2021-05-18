<?php

namespace Database\Factories;

use App\Models\Itinerary;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItineraryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Itinerary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'trip_id'   => Trip::factory(),
            'day'       => 1,
            'day_title' => $this->faker->sentence(8),
            'day_max_altitude'  => $this->faker->numberBetween(1400,5500),
            'day_body'  => $this->faker->paragraph(3, true),
        ];
    }
}
