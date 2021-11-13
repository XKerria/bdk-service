<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function index(Request $request) {
        $params = $request->query();
        return Brand::resolve($params)->page($params);
    }

    function show(Brand $brand) {
        return $brand;
    }

    function store(BrandRequest $request) {
        $brand = Brand::create($request->validated());
        return $brand->fresh();
    }

    function update(BrandRequest $request, Brand $brand) {
        $brand->fill($request->validated())->save();
        return $brand->fresh();
    }

    function destroy(Brand $brand) {
        return $brand->delete();
    }
}
