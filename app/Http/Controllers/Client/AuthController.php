<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CodeRequest;
use App\Models\Wechat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login(CodeRequest $request) {
        $data = $request->validated();
        $result = $this->service->code2Session($data['code']);
        $wechat = Wechat::find($result['openid']);
        if (is_null($wechat)) return $result;

        $wechat->fill($result)->save();
        $user = $wechat->user;
        if (is_null($user)) return $result;
        $data = [
            'user' => $user,
            'wechat' => $wechat->fresh(),
            'token' => $user->createToken($user->id)->plainTextToken,
        ];
        if (!is_null($this->expiration)) {
            $data['expired_at'] = Carbon::now()->add($this->expiration, 'minute');
        }
        return $data;
    }
}
