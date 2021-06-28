<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CodeRequest;
use App\Http\Requests\Client\DecryptRequest;
use App\Models\Wechat;
use App\Services\WeixinService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WechatController extends Controller
{
    private WeixinService $service;

    public function __construct() {
        $id = env('WECHAT_APP_ID');
        $secret = env('WECHAT_APP_SECRET');
        $this->service = new WeixinService($id, $secret);
    }

    function login(CodeRequest $request) {
        $data = $request->validated();
        $result = $this->service->code2Session($data['code']);
        $wechat = Wechat::find($result['openid']);
        if (is_null($wechat)) return $result;
        else return $wechat;
    }

    function decrypt(DecryptRequest $request) {
        $data = $request->validated();
        $sessionKey = Arr::pull($data, 'session_key');
        return $this->service->decrypt($data, $sessionKey);
    }
}
