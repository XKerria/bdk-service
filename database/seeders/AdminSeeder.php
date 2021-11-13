<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::factory()->createMany([
            ['phone' => '18166750612', 'name' => '饶中浩'],
            ['phone' => '15985101597', 'name' => '苏省南'],
            ['phone' => '17585908252', 'name' => '张志愿'],
        ]);
    }
}
