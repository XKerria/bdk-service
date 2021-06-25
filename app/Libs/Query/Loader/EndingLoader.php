<?php


namespace App\Libs\Query\Loader;

use Illuminate\Database\Eloquent\Model;

class EndingLoader extends AbstractLoader {

    public function load(Model $entity, array $params): Model {
        return $entity;
    }
}
