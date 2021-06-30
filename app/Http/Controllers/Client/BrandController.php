<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Cache;

class BrandController extends Controller {

    function index () {
        return Cache::rememberForever('brands', function () {
            return Brand::all();
        });
    }
}
