<?php


namespace App\Services;


abstract class AbstractBucketService {
    protected array $config;

    public function __construct(string $type) {
        $this->config = config("bucket.{$type}");
    }

    abstract function sts();
}
