<?php


namespace App\Libs\Query;


use App\Libs\Query\Loader\EndingLoader;
use App\Libs\Query\Loader\WithCountLoader;
use App\Libs\Query\Loader\WithLoader;
use Illuminate\Database\Eloquent\Model;

class FindOneQueryChain {
    private Model $entity;
    private array $params;

    public function __construct(Model $entity, array $params) {
        $this->entity = $entity;
        $this->params = $params;
    }

    public function handle(): Model {
        $ending = new EndingLoader();
        $withCount = new WithCountLoader($ending);
        $with = new WithLoader($withCount);
        return $with->load($this->entity, $this->params);
    }
}
