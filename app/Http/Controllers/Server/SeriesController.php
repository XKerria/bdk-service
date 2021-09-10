<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\SeriesRequest;
use App\Libs\Query\FindAllQueryChain;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index(Request $request) {
        $chain = new FindAllQueryChain(Series::query(), $request->query());
        if (!$request->has('page')) return $chain->handle()->orderByRaw('convert(`name` using gbk) asc')->get();
        return $chain->handle()->paginate($request->query('size', 20), ['*'], 'page', $request->query('page', 1));
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
