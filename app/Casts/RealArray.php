<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class RealArray implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return is_null($value) ? array() : json_decode($value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value);
    }
}
