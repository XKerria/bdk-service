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
        $prefix = env('ALI_OSS_ENDPOINT', '');
        Setting::factory()->createMany([
            ['category' => '通用设置', 'name' => 'LOGO占位图片', 'type'=>'image', 'value' => $prefix . '/common/ph-LOGO.png'],
            ['category' => '通用设置', 'name' => '门头占位图片', 'type'=>'image', 'value' => $prefix . '/common/ph-门头.jpg'],

            ['category' => '管理后台', 'name' => 'LOGO', 'type'=>'image', 'value' => $prefix . '/images/00d79c0eaa55d7914698560b8d2c46ac.png'],
            ['category' => '管理后台', 'name' => '平台名称', 'value' => '奔得快租赁'],
            ['category' => '管理后台', 'name' => '登录背景', 'type'=>'image', 'value' => $prefix . '/images/e2d5611f54445dd5266a41795ee2c3dc.jpg'],
            ['category' => '管理后台', 'name' => '后台表格默认行数', 'type' => 'integer', 'value' => '50'],

            ['category' => '微信小程序', 'name' => 'APP ID', 'value' => env('WECHAT_MINI_APP_ID'), 'editable' => false],
            ['category' => '微信小程序', 'name' => 'APP Secret', 'value' => env('WECHAT_MINI_APP_SECRET'), 'editable' => false],
            ['category' => '微信小程序', 'name' => '客服电话', 'value' => '18111881144'],

            ['category' => '云服务', 'name' => 'ID', 'value' => env('ALI_ACCESS_KEY_ID'), 'editable' => false],
            ['category' => '云服务', 'name' => '密钥', 'value' => env('ALI_ACCESS_KEY_SECRET'), 'editable' => false],
            ['category' => '云服务', 'name' => '类型', 'type' => 'enum', 'value' => '阿里云', 'options' => '阿里云,腾讯云', 'editable' => false],
            ['category' => '云服务', 'name' => '存储桶', 'value' => env('ALI_OSS_BUCKET'), 'editable' => false],
            ['category' => '云服务', 'name' => '区域', 'value' => env('ALI_OSS_REGION'), 'editable' => false],
            ['category' => '云服务', 'name' => '短信签名', 'value' => env('ALI_SMS_SIGN'), 'editable' => false],
            ['category' => '云服务', 'name' => '短信节点', 'value' => env('ALI_SMS_ENDPOINT'), 'editable' => false],
            ['category' => '云服务', 'name' => '验证码缓存时间', 'value' => env('ALI_SMS_EXPIRATION', 300), 'editable' => false],
        ]);
    }
}
