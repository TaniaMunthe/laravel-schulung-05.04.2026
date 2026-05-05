<?php

namespace Database\Factories;

use App\Enums\EventType;
use App\Models\Event;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $days = $this->faker->numberBetween(0, 5);
        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $endDate = $this->faker->dateTimeInInterval($startDate,"+{$days} day");

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(EventType::cases()),
            'location' => $this->faker->city(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'trainer_id' => Trainer::factory(),
        ];
    }
}
