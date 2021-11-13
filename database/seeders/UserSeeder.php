<?php

namespace Database\Seeders;

use App\Models\Firm;
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
        $dscc = Firm::where('name', 'DSCC超跑俱乐部')->first();
        $test = Firm::where('name', '测试公司（微信审核）')->first();

        User::factory()->createMany([
            ['name' => '张经理', 'phone' => '17585908252', 'firm_id' => $dscc->id],
            ['name' => '微信测试员', 'phone' => '19999999999', 'firm_id' => $test->id],
            ['name' => '饶中浩', 'phone' => '18166750612', 'firm_id' => $test->id],
            ['name' => '苏省南', 'phone' => '15985101597', 'firm_id' => $test->id],
        ]);
    }
}
