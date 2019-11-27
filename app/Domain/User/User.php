<?php

namespace Domain\User;

use Domain\Dog\Dog;
use Infrastructure\Model\BaseModel;

class User extends BaseModel {
    protected $fillable = ['name'];

    public function dogs()
    {
        return $this->belongsToMany(Dog::class, 'users_dogs');
    }
}
