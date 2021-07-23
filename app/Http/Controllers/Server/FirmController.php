<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\FirmRequest;
use App\Libs\Query\FindAllQueryChain;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller {
    function index(Request $request) {
        $chain = new FindAllQueryChain(Firm::query(), $request->query());
        if (!$request->has('page')) return $chain->handle()->orderByRaw('convert(`name` using gbk) asc')->get();
        return $chain->handle()->paginate($request->query('size', 20), ['*'], 'page', $request->query('page', 1));
    }

    function show(Firm $firm) {
        return $firm;
    }

    function store(FirmRequest $request) {
        $firm = Firm::create($request->validated());
        return $firm->fresh();
    }

    function update(FirmRequest $request, Firm $firm) {
        $firm->fill($request->validated())->save();
        return $firm->fresh();
    }


    function destroy(Firm $firm) {
        return $firm->delete();
    }
}
