<?php

namespace Database\Seeders;

use App\Imports\SeriesImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new SeriesImport, resource_path('data/series.csv'));
    }
}
