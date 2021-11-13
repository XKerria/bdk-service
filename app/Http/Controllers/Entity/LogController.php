<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogRequest;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return Log::resolve($params)->page($params);
    }

    function show(Log $log) {
        return $log;
    }

    function store(LogRequest $request) {
        $log = Log::create($request->validated());
        return $log->fresh();
    }

    function update(LogRequest $request, Log $log) {
        $log->fill($request->validated())->save();
        return $log->fresh();
    }

    function destroy(Log $log) {
        return $log->delete();
    }
}
