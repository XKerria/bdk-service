<?php


namespace App\Services;


use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class OssBucketService extends AbstractBucketService {
    function sts() {
        AlibabaCloud::accessKeyClient($this->id, $this->secret)->regionId($this->region)->asDefaultClient();
        try {
            $result = AlibabaCloud::rpc()
                ->product('Sts')
                ->scheme('https')
                ->version('2015-04-01')
                ->action('AssumeRole')
                ->method('POST')
                ->host($this->host)
                ->options([
                    'query' => [
                        'RegionId' => $this->region,
                        'RoleArn' => 'acs:ram::1447500320981548:role/oss-admin',
                        'RoleSessionName' => 'OSS-Admin',
                    ],
                ])
                ->request();
            return $result->toArray();
        } catch (ClientException | ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
            return null;
        }
    }
}
