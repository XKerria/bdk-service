<?php


namespace App\Libs\Query\Loader;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractLoader {
    public function __construct(AbstractLoader $next = null) {
        if (isset($next)) $this->next = $next;
    }

    protected AbstractLoader $next;
    abstract public function load(Model $entity, array $params): Model;
}
