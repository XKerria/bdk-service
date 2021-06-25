<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class LikeBuilder extends AbstractBuilder {

    public function build(Builder $query, array $params): Builder {
        $args = array_filter(explode('|', Arr::get($params, 'like', '')));
        if (count($args) == 0) return $this->next->build($query, $params);

        $builder = $query;
        $builder->where(function (Builder $q) use ($args) {
            foreach ($args as $arg) {
                [$key, $val] = explode(':', $arg);
                if (empty($val)) continue;
                $q->orWhere($key, 'like', "%{$val}%");
            }
        });
        return $this->next->build($builder, $params);
    }
}
