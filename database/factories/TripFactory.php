<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'   => Category::factory(),
            'user_id'       => User::factory(), 
            'name'          => $this->faker->sentence(5),
            'slug'          => $this->faker->slug(),
            'difficulty'    => 'easy',
            'max_altitude_mtr'  => $this->faker->numberBetween(1400,6000),

        ];
    }
}
