<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandSeriesController extends Controller
{
    function index(Brand $brand) {
        return $brand->series;
    }
}
