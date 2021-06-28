<?php

namespace Database\Seeders;

use App\Models\Brand;
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
            BrandSeeder::class,
            SeriesSeeder::class,
        ]);

        if (app()->environment() == 'local') {
            $this->call([
                BannerSeeder::class,
                FirmSeeder::class
            ]);
        }
    }
}
