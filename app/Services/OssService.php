<?php


namespace App\Services;


use Illuminate\Support\Arr;

class OssService {
    public function __construct() {
        $this->host = env('APP_URL');
        $this->id = Arr::get($this->config, 'sts_id');
        $this->secret = Arr::get($this->config, 'sts_secret');
        $this->region = Arr::get($this->config, 'region');
        $this->bucket = Arr::get($this->config, 'bucket');
    }

}
