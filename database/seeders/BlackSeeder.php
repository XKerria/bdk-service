<?php

namespace Database\Seeders;

use App\Models\Black;
use Illuminate\Database\Seeder;

class BlackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Black::factory()->count(100)->create();
    }
}
