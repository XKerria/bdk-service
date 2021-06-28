<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller {

    function index () {
        return Brand::all();
    }
}
