<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index() {
        return Series::all();
    }
}
