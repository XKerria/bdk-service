<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class RelateInBuilder extends AbstractBuilder {

    public function build(Builder $query, array $params): Builder {
        $args = array_filter(explode('|', Arr::get($params, 'relateIn', '')));
        if (count($args) == 0) return $this->next->build($query, $params);

        $builder = $query;
        foreach ($args as $arg) {
            [$key, $vals] = explode(':', $arg);
            [$rel, $field] = explode('.', $key);
            if ($vals != '*') {
                $builder = $builder->whereHas($rel, function (Builder $query) use ($field, $vals) {
                    $query->whereIn($field, array_filter(explode(',',$vals)));
                });
            }
        }
        return $this->next->build($builder, $params);
    }
}
