<?php

namespace Database\Seeders;

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
        $this->call([
            SettingSeeder::class,
            BrandSeeder::class,
            SeriesSeeder::class,
        ]);

        if (app()->environment() == 'local') {
            $this->call([
                FirmSeeder::class,
                UserSeeder::class,
                BannerSeeder::class,
                VehicleSeeder::class,
                BlackSeeder::class
            ]);
        }
    }
}
