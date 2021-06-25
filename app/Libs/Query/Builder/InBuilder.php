<?php


namespace App\Libs\Query\Builder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class InBuilder extends AbstractBuilder {

    public function build(Builder $query, array $params): Builder {
        $args = array_filter(explode('|', Arr::get($params, 'in', '')));
        if (count($args) == 0) return $this->next->build($query, $params);

        $builder = $query;
        foreach ($args as $arg) {
            $tmp = explode(':', $arg);
            if ($tmp[1] != '*') {
                $builder = $builder->whereIn($tmp[0], array_filter(explode(',', Arr::get($tmp, 1, ''))));
            }
        }
        return $this->next->build($builder, $params);
    }
}
