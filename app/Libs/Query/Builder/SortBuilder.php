<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class SortBuilder extends AbstractBuilder {

    protected array $modes = [
        'asc' => 'asc',
        'desc' => 'desc',
        'ascend' => 'asc',
        'descend' => 'desc'
    ];

    public function build(Builder $query, array $params): Builder {
        $args = array_filter(explode('|', Arr::get($params, 'sort', '')));
        if (count($args) == 0) return $this->next->build($query, $params);

        $builder = $query;
        foreach ($args as $arg) {
            $tmp = explode(':', $arg);
            $temp = explode(',', Arr::get($tmp, 1, ''));

            $field = $tmp[0];
            $mode = $temp[0];
            $mode = Arr::get($this->modes, $mode, 'asc');
            $encoding = Arr::get($temp, 1, 'utf8');

            if ($encoding == 'utf8') {
                $builder = $builder->orderBy($field, $mode);
            } else {
                $builder = $builder->orderByRaw("convert({$field} using {$encoding}) {$mode}");
            }
        }
        return $this->next->build($builder, $params);
    }
}
