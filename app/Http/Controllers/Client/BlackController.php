<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\BlackRequest;
use App\Models\Black;
use Illuminate\Http\Request;

class BlackController extends Controller {
    function index() {
        return Black::orderByRaw("convert(name using gbk)")->get();
    }

    function store(BlackRequest $request) {
        return Black::create($request->validated())->fresh();
    }
}
