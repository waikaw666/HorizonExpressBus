<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Destination;
use App\Models\Driver;
use App\Models\Origin;
use App\Models\Schedule;
use App\Models\Admin;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeding Seats
        $rows = range('A', 'H');
        $columns = range(1, 4);

        foreach ($rows as $row) {
            foreach ($columns as $column) {
                Seat::create([
                    'seat_number' => $row . $column,
                ]);
            }
        }

        // Admin Seeding
        $admin = new Admin();
        $admin->name = 'Admin User';
        $admin->email = 'admin@example.com';
        $admin->phonenumber = '199';
        $admin->role = 'owner';
        $admin->password = bcrypt('password');
        $admin->save();

        // City Data Seeding
        $cities = ["Yangon", "Mandalay", "Lashio", "Taung Gyi", "Pyin Oo Lwin"];

        for($i = 0; $i < count($cities); $i++){
            Origin::factory()->create([
                'origin_name' => $cities[$i],
            ]);

            Destination::factory()->create([
                'destination_name' => $cities[$i],
            ]);
        }

        $origins = Origin::all();
        $destinations = Destination::all();

        // Bus Routes Seeding
        for ($i = 0; $i < count($origins); $i++) {
            for ($j = 0; $j < count($destinations); $j++) {
                if ($origins[$i]->id != $destinations[$j]->id) {
                    BusRoute::factory()->create([
                        'origin_id' => $origins[$i]->id,
                        'destination_id' => $destinations[$j]->id,
                    ]);
                }
            }
        }

        // Burmese bus, driver and schedule data
        $burmese_buses = [
            ['plate_number' => 'MDY 1234', 'bus_type' => 'VIP'],
            ['plate_number' => 'YGN 5678', 'bus_type' => 'Regular'],
            ['plate_number' => 'NPY 9101', 'bus_type' => 'Express'],
        ];

        $burmese_drivers = [
            ['name' => 'U Maung Maung', 'phone_number' => '0912345678'],
            ['name' => 'U Aung Aung', 'phone_number' => '0923456789'],
            ['name' => 'U Kyaw Kyaw', 'phone_number' => '0934567890'],
        ];

        $dates = ['2024-10-01', '2024-10-02', '2024-10-03','2024-10-04','2024-10-05','2024-10-06','2024-10-07'];

        $times = [
            ['departure' => '8:00 AM', 'arrival' => '12:00 PM'],
            ['departure' => '1:00 PM', 'arrival' => '5:00 PM'],
            ['departure' => '6:00 PM', 'arrival' => '10:00 PM'],
            ['departure' => '11:00 PM', 'arrival' => '3:00 AM'],
            ['departure' => '4:00 AM', 'arrival' => '8:00 AM'],
            ['departure' => '9:00 AM', 'arrival' => '1:00 PM'],
            ['departure' => '2:00 PM', 'arrival' => '6:00 PM'],
            ['departure' => '7:00 PM', 'arrival' => '11:00 PM'],
            ['departure' => '12:00 AM', 'arrival' => '4:00 AM'],
            ['departure' => '5:00 AM', 'arrival' => '9:00 AM'],
            ['departure' => '10:00 AM', 'arrival' => '2:00 PM'],
            ['departure' => '3:00 PM', 'arrival' => '7:00 PM'],
            ['departure' => '8:00 PM', 'arrival' => '12:00 AM'],
            ['departure' => '1:00 AM', 'arrival' => '5:00 AM'],
            ['departure' => '6:00 AM', 'arrival' => '10:00 AM'],
            ['departure' => '11:00 AM', 'arrival' => '3:00 PM'],
            ['departure' => '4:00 PM', 'arrival' => '8:00 PM'],
            ['departure' => '9:00 PM', 'arrival' => '1:00 AM'],
            ['departure' => '2:00 AM', 'arrival' => '6:00 AM'],
            ['departure' => '7:00 AM', 'arrival' => '11:00 AM'],
            ['departure' => '12:00 PM', 'arrival' => '4:00 PM'],
            ['departure' => '5:00 PM', 'arrival' => '9:00 PM'],
            ['departure' => '10:00 PM', 'arrival' => '2:00 AM'],
            ['departure' => '3:00 AM', 'arrival' => '7:00 AM'],
        ];

        foreach ($burmese_buses as $key => $busData) {
            $bus = Bus::create([
                'bus_type' => $busData['bus_type'],
                'plate_number' => $busData['plate_number'],
                'description' => 'This is a Burmese bus',
            ]);

            $driver = new Driver();
            $driver->name = $burmese_drivers[$key]['name'];
            $driver->phone_number = $burmese_drivers[$key]['phone_number'];
            $driver->address = 'Unknown';
            $driver->save();

            foreach ($dates as $date) {
                foreach ($times as $time) {
                    Schedule::create([
                        'bus_route_id' => BusRoute::inRandomOrder()->first()->id,
                        'bus_id' => $bus->id,
                        'price' => '20000',
                        'departure_time' => $time['departure'],
                        'arrival_time' => $time['arrival'],
                        'date' => $date,
                        'duration' => '4 hours',
                    ]);
                }
            }
        }
    }
}
