<?php

namespace Domain\User;

use Infrastructure\Repository\BaseRepository;

class UserRepository extends BaseRepository {

    protected function setQuery()
    {
        $this->query = User::query();
    }
}
