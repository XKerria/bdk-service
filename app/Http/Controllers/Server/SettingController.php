<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    function index() {
        return Setting::all();
    }
    function show(Setting $setting) {
        return $setting;
    }
}
