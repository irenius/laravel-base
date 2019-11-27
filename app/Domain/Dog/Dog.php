<?php

namespace Domain\Dog;

use Domain\User\User;
use Infrastructure\Model\BaseModel;

class Dog extends BaseModel {
    protected $fillable = ['name'];

    public function owners()
    {
        return $this->belongsToMany(User::class, 'users_dogs');
    }
}
