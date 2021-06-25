<?php


namespace App\Libs\Query;


use App\Libs\Query\Builder\EndingBuilder;
use App\Libs\Query\Builder\EqualsBuilder;
use App\Libs\Query\Builder\InBuilder;
use App\Libs\Query\Builder\LikeBuilder;
use App\Libs\Query\Builder\RelateInBuilder;
use App\Libs\Query\Builder\SortBuilder;
use App\Libs\Query\Builder\TopBuilder;
use App\Libs\Query\Builder\WithBuilder;
use App\Libs\Query\Builder\WithCountBuilder;
use Illuminate\Database\Eloquent\Builder;

class FindAllQueryChain {
    private Builder $query;
    private array $params;
    private array $excludes = ['page', 'size'];

    public function __construct(Builder $query, array $params) {
        $this->query = $query;
        $this->params = array_filter($params, function ($key) {
            return !in_array($key, $this->excludes);
        }, ARRAY_FILTER_USE_KEY);
    }

    public function handle(): Builder {
        $ending = new EndingBuilder();

        $top = new TopBuilder($ending);
        $orderBy = new SortBuilder($top);
        $withCount = new WithCountBuilder($orderBy);
        $with = new WithBuilder($withCount);
        $like = new LikeBuilder($with);
        $relateIn = new RelateInBuilder($like);
        $in = new InBuilder($relateIn);
        $equals = new EqualsBuilder($in);

        return $equals->build($this->query, $this->params);
    }
}
