<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Firm;
use Illuminate\Database\Seeder;

class FirmSeeder extends Seeder
{
    public function run()
    {
        $brands = Brand::all();
        Firm::factory()->create([
            'name' => 'DSCC超跑俱乐部',
            'brands' => $brands->random(rand(3, 5))->pluck('name')
        ]);
        Firm::factory()->create([
            'name' => '测试公司（微信审核）',
            'brands' => $brands->random(rand(3, 5))->pluck('name')
        ]);

        Firm::factory()->state(function() use ($brands) {
            return [
                'brands' => $brands->random(rand(3, 5))->pluck('name')
            ];
        })->create();
    }
}
