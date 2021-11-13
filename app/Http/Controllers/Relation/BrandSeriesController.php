<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesRequest;
use App\Models\Brand;
use App\Models\Firm;
use App\Models\Series;
use Illuminate\Http\Request;

class BrandSeriesController extends Controller
{
    function index(Request $request, Brand $brand) {
        $params = $request->query();
        return $brand->series()->resolve($params)->page($params);
    }

    function store(SeriesRequest $request, Brand $brand) {
        $series = $brand->series()->create($request->validated());
        return $series->fresh();
    }
}
