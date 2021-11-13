<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return Series::resolve($params)->page($params);
    }

    function show(Series $series) {
        return $series;
    }

    function store(SeriesRequest $request) {
        $series = Series::create($request->validated());
        return $series->fresh();
    }

    function update(SeriesRequest $request, Series $series) {
        $series->fill($request->validated())->save();
        return $series->fresh();
    }

    function destroy(Series $series) {
        return $series->delete();
    }
}
