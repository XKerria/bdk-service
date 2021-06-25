<?php


namespace App\Libs\Query\Loader;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class WithCountLoader extends AbstractLoader {

    public function load(Model $entity, array $params): Model {
        $args = array_filter(explode('|', Arr::get($params, 'withCount', '')));
        if (count($args) == 0) return $this->next->load($entity, $params);

        $entity->loadCount($args);
        return $this->next->load($entity, $params);
    }
}
