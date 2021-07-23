<?php

namespace App\Http\Controllers\Server;

use App\Exceptions\TimeoutException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Server\BrandRequest;
use App\Libs\Query\FindAllQueryChain;
use App\Models\Brand;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Kra8\Snowflake\Snowflake;

class BrandController extends Controller {
    private string $url = 'https://tool.bitefu.net/car/?type=brand';
    private Snowflake $snowflake;

    public function __construct() {
        $this->snowflake = app('Kra8\Snowflake\Snowflake');
    }

    function index(Request $request) {
        $chain = new FindAllQueryChain(Brand::query(), $request->query());
        if (!$request->has('page')) return $chain->handle()->orderByRaw('convert(`name` using gbk) asc')->get();
        return $chain->handle()->paginate($request->query('size', 20), ['*'], 'page', $request->query('page', 1));
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


    function sync() {
        try {
            $result = Http::timeout(5)->get($this->url)->json();
            $brands = $this->generate($result['info']);
            return Brand::upsert($brands, ['name'], ['logo', 'letter']);
        } catch (ConnectException $e) {
            if (Str::startsWith($e->getMessage(), 'cURL error 28')) {
                throw new TimeoutException();
            }
            throw $e;
        }
    }

    function generate(array $info) {
        return array_map(function ($i) {
            return [
                'id' => $this->snowflake->next(),
                'name' => $i['name'],
                'logo' => $i['img'],
                'letter' => $i['firstletter'],
            ];
        }, $info);
    }
}
