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
            AdminSeeder::class,
            BrandSeeder::class,
            SeriesSeeder::class,
        ]);

        if (app()->environment() == 'production') {
            $this->call([
                FirmSeeder::class,
                UserSeeder::class,
                BannerSeeder::class,
            ]);
        }

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
