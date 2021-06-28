<?php

namespace Database\Seeders;

use App\Imports\BrandImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Excel::import(new BrandImport, resource_path('data/brands.csv'));
    }
}
