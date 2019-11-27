<?php

namespace Domain\Dog;

use Domain\User\User;
use Illuminate\Database\Eloquent\Builder;
use Infrastructure\Repository\BaseRepository;

class DogRepository extends BaseRepository {

    protected function setQuery()
    {
        $this->query = Dog::query();
    }

    /**
     * @param string|User $owner
     *
     * @return $this
     */
    public function byOwner($owner)
    {
        if ($owner instanceof User)
        {
            $owner = $owner->id;
        }

        $this->query->whereHas('owners', function (Builder $query) use ($owner) {
            $query->where('user_id', $owner);
        });

        return $this;
    }
}
