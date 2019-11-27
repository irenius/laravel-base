<?php
namespace Infrastructure\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Base repository.
 * @mixin Builder
 */
abstract class BaseRepository
{
    /**
     * @var Builder
     */
    protected $query;

    public function __construct()
    {
        $this->setQuery();
    }

    /**
     * @return void
     */
    protected abstract function setQuery();

    protected function reset()
    {
        $this->query = $this->query->newModelInstance()->query();
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function searchName($name)
    {
        $this->query->where('name', 'LIKE', "%{$name}%");

        return $this;
    }

    /**
     * @param array                          $select
     * @param \Illuminate\Support\Collection $params
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(array $select, Collection $params)
    {
        return $this->query->paginate($params->get('limit'), $select, 'page', $params->get('page'));
    }

    /**
     * Magic method that makes it possible to chain both
     * repository functions and Laravel query builder functions together
     *
     * @param $name
     * @param $arguments
     *
     * @return $this
     */
    public function __call($name, $arguments)
    {
        $result = $this->query->{$name}(...$arguments);

        if ($result instanceof Builder) {
            return $this;
        }

        $this->reset();

        return $result;
    }
}
