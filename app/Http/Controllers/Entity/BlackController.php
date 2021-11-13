<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlackRequest;
use App\Models\Black;
use Illuminate\Http\Request;

class BlackController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return Black::resolve($params)->page($params);
    }

    function show(Black $black) {
        return $black;
    }

    function store(BlackRequest $request) {
        $black = Black::create($request->validated());
        return $black->fresh();
    }

    function update(BlackRequest $request, Black $black) {
        $black->fill($request->validated())->save();
        return $black->fresh();
    }

    function destroy(Black $black) {
        return $black->delete();
    }
}
