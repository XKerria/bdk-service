<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;

class EndingBuilder extends AbstractBuilder {

    public function build(Builder $query, array $params): Builder {
        return $query;
    }
}
