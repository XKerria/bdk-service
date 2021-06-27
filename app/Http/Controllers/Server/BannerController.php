<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller {
    function index(Request $request) {
        return Banner::all();
    }

    function show(Request $request, Banner $banner) {
        return $banner;
    }

    function store(BannerRequest $request) {
        return Banner::create($request->validated());
    }

    function update(BannerRequest $request, Banner $banner) {
        $banner->fill($request->validated());
        $banner->save();
        return $banner->refresh();
    }

    function destroy(Banner $banner) {
        $banner->delete();
        return $banner;
    }
}
