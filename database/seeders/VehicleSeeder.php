<?php

namespace Database\Seeders;

use App\Models\Firm;
use App\Models\Series;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $series = Series::all();
        $firms = Firm::all();
        Vehicle::factory()->count(100)->state(function() use ($series, $firms) {
            return [
                'series_id' => $series->random()->id,
                'firm_id' => $firms->random()->id,
            ];
        })->create();
    }
}
