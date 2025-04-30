<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Destination;
use App\Models\Origin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bus_id' => Bus::factory(),
            'origin_id' => Origin::factory(),
            'destination_id' => Destination::factory(),
            'departure_time' => fake()->time('07:00'),
            'arrival_time' => fake()->time('07:00'),
            'date' => fake()->date,
            'duration' => fake()->randomLetter(),
        ];
    }
}
