<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class TopBuilder extends AbstractBuilder {

    public function build(Builder $query, array $params): Builder {
        $top = Arr::get($params, 'top', 0);
        if ($top == 0) return $this->next->build($query, $params);
        $builder = $query;
        $builder = $builder->limit(intval($top));
        return $this->next->build($builder, $params);
    }
}
