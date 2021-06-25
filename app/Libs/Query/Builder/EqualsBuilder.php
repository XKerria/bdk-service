<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class EqualsBuilder extends AbstractBuilder {

    public function build(Builder $query, array $params): Builder {
        $args = array_filter(explode('|', Arr::get($params, 'eq', '')));
        if (count($args) == 0) return $this->next->build($query, $params);

        $builder = $query;
        foreach ($args as $arg) {
            $tmp = explode(':', $arg);
            $temp = explode(',', Arr::get($tmp, 1, ''));

            $field = $tmp[0];
            $val = $temp[0];
            $op = Arr::get($temp, 1, '=');

            if (count($tmp) < 2) continue;
            if ($val == 'null' || $val == '') {
                $builder = $builder->whereNull($field);
            } else {
                $builder = $builder->where($field, $op, $val);
            }
        }
        return $this->next->build($builder, $params);
    }
}
