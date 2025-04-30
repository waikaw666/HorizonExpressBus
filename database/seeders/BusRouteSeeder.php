<?php

namespace Database\Seeders;

use App\Models\Origin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $origins = Origin::all();
        $destinations = Origin::all();

        for ($i = 0; $i < count($origins); $i++) {
            for ($j = 0; $j < count($destinations); $j++) {
                if ($origins[$i]->id != $destinations[$j]->id) {
                    \App\Models\BusRoute::factory()->create([
                        'origin_id' => $origins[$i]->id,
                        'destination_id' => $destinations[$j]->id,
                    ]);
                }
            }
        }
    }
}
