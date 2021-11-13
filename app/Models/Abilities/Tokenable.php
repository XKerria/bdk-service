<?php

namespace App\Models\Abilities;

use Carbon\Carbon;

trait Tokenable
{
    public function generateToken(string $name = 'token', array $abilities = ['*']): array {
        $this->tokens()->delete();
        $token = [ 'access_token' => $this->createToken($name, $abilities)->plainTextToken ];
        $expiration = config('sanctum.expiration', null);
        if (!is_null($expiration)) $token['expired_at'] = Carbon::now()->add(intval($expiration), 'minute');
        return $token;
    }
}
