<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::factory()->createMany([
            ['name' => 'logo', 'value' => 'https://picsum.photos/200/200?random=1'],
            ['name' => '平台名称', 'value' => 'DSCC汽车平台'],
            ['name' => '登录背景', 'value' => 'https://picsum.photos/1440/900?random=2']
        ]);
    }
}
