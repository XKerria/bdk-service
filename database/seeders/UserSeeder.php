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
            ['name' => '饶中浩', 'phone' => '18166750612'],
            ['name' => '苏省南', 'phone' => '15985101597'],
            ['name' => '张林鹏', 'phone' => '18685101987'],
            ['name' => '戴继龙', 'phone' => '18984184886'],
            ['name' => '杨华军', 'phone' => '18111111111'],
            ['name' => '张志愿', 'phone' => '18222222222'],
        ]);
    }
}
