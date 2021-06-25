<?php


namespace App\Libs\Query\Builder;


use Illuminate\Database\Eloquent\Builder;

abstract class AbstractBuilder {
    public function __construct(AbstractBuilder $next = null) {
        if (isset($next)) $this->next = $next;
    }

    protected AbstractBuilder $next;
    abstract public function build(Builder $query, array $params): Builder;
}
