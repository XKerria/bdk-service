<?php

namespace App\Http\Controllers\Server;

use App\Exceptions\TimeoutException;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Kra8\Snowflake\Snowflake;

class BrandController extends Controller {
    private string $url = 'https://tool.bitefu.net/car/?type=brand';
    private Snowflake $snowflake;

    public function __construct() {
        $this->snowflake = app('Kra8\Snowflake\Snowflake');
    }

    function index() {
        return Brand::all();
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
