<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bus_route = BusRoute::first();

        $bus = Bus::create([
            'bus_type' => 'AC',
            'plate_number' => 'ABC123',
            'description' => 'This is a sample bus',
        ]);


        $schedules = Schedule::create([
            'bus_route_id'=> $bus_route->id,
            'bus_id' => $bus->id,
            'departure_time' => '10:00 AM',
            'arrival_time' => '12:00 PM',
            'date' => '2024-08-12',
            'duration' => '2 hours',
        ]);
    }
}
