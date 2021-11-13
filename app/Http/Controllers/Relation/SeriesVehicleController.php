<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesVehicleController extends Controller
{
    function index(Request $request, Series $series) {
        $params = $request->query();
        return $series->vehicles()->resolve($params)->page($params);
    }
}
