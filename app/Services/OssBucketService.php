<?php


namespace App\Services;


use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use Illuminate\Support\Arr;

class OssBucketService extends AbstractBucketService {
    protected string $id;
    protected string $secret;
    protected string $host;
    protected string $region;

    public function __construct(string $type) {
        parent::__construct($type);
        $this->id = Arr::get($this->config, 'sts_id');
        $this->secret = Arr::get($this->config, 'sts_secret');
        $this->host = Arr::get($this->config, 'sts_host');
        $this->region = Arr::get($this->config, 'region');
    }

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
