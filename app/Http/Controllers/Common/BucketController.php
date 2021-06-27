<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\AbstractBucketService;
use App\Services\OssBucketService;

class BucketController extends Controller
{
    protected AbstractBucketService $service;

    public function __construct() {
        $this->service = new OssBucketService('oss');
    }

    function sts() {
        return $this->service->sts();
    }
}
