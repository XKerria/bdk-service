<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class WithBuilder extends AbstractBuilder {

    public function build(Builder $query, array $params): Builder {
        $args = array_filter(explode('|', Arr::get($params, 'with', '')));
        if (count($args) == 0) return $this->next->build($query, $params);

        $builder = $query->with($args);
        return $this->next->build($builder, $params);
    }
}
