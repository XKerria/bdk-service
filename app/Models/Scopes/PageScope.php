<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait PageScope {
    public function scopePage(Builder $query, array $params) {
        if (!Arr::has($params, 'page')) return $query->get();
        return $query->paginate(Arr::get($params, 'size', 20), ['*'], 'page', Arr::get($params, 'page', 1));
    }
}
