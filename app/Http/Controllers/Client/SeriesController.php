<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SeriesController extends Controller
{
    function index() {
        return Cache::rememberForever('series', function () {
            return Series::all();
        });
    }

    function show(Series $series) {
        return $series;
    }
}
