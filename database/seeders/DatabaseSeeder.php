<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $trainer = Trainer::factory(5)->create();
        Event::factory(5)->create([
            'trainer_id' => fn() => $trainer->random()->getKey(),
        ]);
    }
}
