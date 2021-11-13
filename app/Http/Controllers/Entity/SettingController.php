<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return Setting::resolve($params)->page($params);
    }

    function show(Setting $setting) {
        return $setting;
    }

    function update(SettingRequest $request , Setting $setting) {
        $setting->fill($request->validated())->save();
        return $setting->fresh();
    }
}
