<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->createMany([
            ['name' => '张经理', 'phone' => '17585908252'],
            ['name' => '饶中浩', 'phone' => '18166750612'],
            ['name' => '苏省南', 'phone' => '15985101597'],
        ]);
    }
}
