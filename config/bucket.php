<?php

return [
    'oss' => [
        'sts_id' => env('OSS_STS_ID'),
        'sts_secret' => env('OSS_STS_SECRET'),
        'sts_host' => env('OSS_STS_HOST'),
        'region' => env('OSS_BUCKET_REGION'),
        'name' => env('OSS_BUCKET_NAME'),
        'endpoint' => env('OSS_BUCKET_ENDPOINT')
    ]
];
