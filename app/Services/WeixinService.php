<?php


namespace App\Services;


use App\Libs\Wechat\DataCrypt;
use Illuminate\Support\Facades\Http;

class WeixinService {
    private string $appId;
    private string $appSecret;

    public function __construct($id, $secret) {
        $this->appId = $id;
        $this->appSecret = $secret;
    }

    public function code2Session(string $code) {
        $url = 'https://api.weixin.qq.com/sns/jscode2session';
        return json_decode(Http::get($url, [
            'appid' => $this->appId,
            'secret' => $this->appSecret,
            'grant_type' => 'authorization_code',
            'js_code' => $code
        ]), true);
    }

    public function decrypt(array $data, string $sessionKey) {
        $crypter = new DataCrypt($this->appId, $sessionKey);
        return $crypter->decryptData($data);
    }
}
