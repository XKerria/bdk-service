<?php

return [
    'oss' => [
        'sts_id' => env('OSS_STS_ID'),
        'sts_secret' => env('OSS_STS_SECRET'),
        'sts_host' => env('OSS_STS_HOST'),
        'access_key_id' => env('OSS_ACCESS_KEY_ID'),
        'access_key_secret' => env('OSS_ACCESS_KEY_SECRET'),
        'region' => env('OSS_REGION'),
        'bucket' => env('OSS_BUCKET'),
        'endpoint' => env('OSS_ENDPOINT')
    ]
];
