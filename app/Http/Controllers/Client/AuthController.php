<?php

namespace App\Http\Controllers\Client;

use App\Exceptions\IncorrectPasswordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AuthRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(AuthRequest $request) {
        $data = $request->validated();
        $user = User::where('phone', $data['phone'])->firstOrFail();
        if (!Hash::check($data['password'], $user->password)) throw new IncorrectPasswordException();
        $user->tokens()->delete();
        $data = $user->toArray();
        $data['token'] =  $user->createToken('token')->plainTextToken;
        $expiration = config('sanctum.expiration', null);
        if (!is_null($expiration)) {
            $data['expired_at'] = Carbon::now()->add(intval($expiration), 'minute');
        }
        return $data;
    }
}
