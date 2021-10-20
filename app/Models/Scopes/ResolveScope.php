<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait ResolveScope {
    public function scopeResolve(Builder $query, array $params) {
        foreach ($params as $key => $param) {
            $params = explode('|', $param);
            switch ($key) {
                case 'in':
                    $query = $this->in($query, $params);
                    break;
                case 'like':
                    $query = $this->like($query, $params);
                    break;
                case 'compare':
                    $query = $this->compare($query, $params);
                    break;
                case 'order':
                    $query = $this->order($query, $params);
                    break;
                case 'top':
                    $query = $this->top($query, $params);
                    break;
                case 'random':
                    $query = $this->random($query, $params);
                    break;
                case 'with':
                    $query = $this->relate($query, $params);
                    break;
                default:
                    break;
            }
        }
        return $query;
    }

    /*
     * field1:value1,value2,value3,...|field2:value1,value2,value3,...
     */
    private function in(Builder $query, array $params): Builder {
        foreach ($params as $param) {
            $field = explode(':', $param)[0];
            $values = explode(',', explode(':', $param)[1]);
            $query->whereIn($field, $values);
        }
        return $query;
    }

    /*
     * field1:value1|field2:value2
     */
    private function like(Builder $query, array $params): Builder {
        $query->where(function (Builder $builder) use ($params) {
            foreach ($params as $param) {
                $field = trim(explode(':', $param)[0]);
                $value = trim(explode(':', $param)[1]);
                if ($value) $builder->orWhere($field, 'like', "%{$value}%");
            }
        });
        return $query;
    }

    /*
     * field1:value1,op1|field2:value2,op2
     */
    private function compare(Builder $query, array $params): Builder {
        foreach ($params as $param) {
            $field = explode(':', $param)[0];
            $value = explode(',', explode(':', $param)[1])[0];
            $op = explode(',', explode(':', $param)[1])[1] ?? '=';
            if ($value == 'null' || $value == '') {
                in_array($op, ['<>', 'not', '!=']) ? $query->whereNotNull($field) : $query->whereNull($field);
            } else {
                $query->where($field, $op, urldecode($value));
            }
        }
        return $query;
    }

    /*
     * field:direction,encoding
     */
    private function order(Builder $query, array $params): Builder {
        $modes = [
            'asc' => 'asc',
            'desc' => 'desc',
            'ascend' => 'asc',
            'descend' => 'desc'
        ];

        foreach ($params as $param) {
            $field = explode(':', $param)[0];
            $direction = Arr::get(explode(',', Arr::get(explode(':', $param), 1, 'asc')), 0);
            $direction = $modes[$direction];
            $encoding = Arr::get(explode(',', Arr::get(explode(':', $param), 1, ',utf8')), 1, 'utf8');
            if ($encoding == 'utf8') {
                $query->orderBy($field, $direction);
            } else {
                $query->orderByRaw("convert({$field} using {$encoding}) {$direction}");
            }
        }
        return $query;
    }

    /*
     * num
     */
    private function top(Builder $query, array $params): Builder {
        $num = Arr::get($params, 0, 0);
        $query->limit($num);
        return $query;
    }

    /*
     * num
     */
    private function random(Builder $query, array $params): Builder {
        $num = Arr::get($params, 0, 0);
        $query->inRandomOrder()->limit($num);
        return $query;
    }

    /*
     * with
     */
    private function relate(Builder $query, array $params): Builder {
        return $query->with($params);
    }
}
