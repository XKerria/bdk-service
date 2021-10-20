<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller {
    function index(Request $request) {
        $params = $request->query();
        return Banner::resolve($params)->page($params);
    }

    function show(Banner $banner) {
        return $banner;
    }

    function store(BannerRequest $request) {
        $banner = Banner::create($request->validated());
        return $banner->fresh();
    }

    function update(BannerRequest $request, Banner $banner) {
        $banner->fill($request->validated())->save();
        return $banner->fresh();
    }

    function destroy(Banner $banner) {
        return $banner->delete();
    }
}
