<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Http\Requests\FirmRequest;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller {
    function index(Request $request) {
        $params = $request->query();
        return Firm::resolve($params)->page($params);
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
