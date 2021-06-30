<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesVehicleController extends Controller
{
    function index(Series $series) {
        return $series->vehicles()->with('firm')->get();
    }
}
