<?php


namespace App\Services;


abstract class AbstractBucketService {
    protected string $id;
    protected string $secret;
    protected string $region;
    protected string $host;

    public function __construct() {
        $this->id = env('BUCKET_ID');
        $this->secret = env('BUCKET_SECRET');
        $this->region = env('BUCKET_REGION');
        $this->host = env('BUCKET_STS_HOST');
    }

    abstract function sts();
}
