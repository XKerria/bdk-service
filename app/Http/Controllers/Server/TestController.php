<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    function index() {
        Cache::forever('fuck', 'alkdsjfladsjkf');
        return Cache::get('fuck');
    }
}
