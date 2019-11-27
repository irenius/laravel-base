<?php

namespace Admin\Http\Controllers;

use Domain\User\User;
use Domain\User\UserRepository;
use Infrastructure\Http\ApiController;

class UserController extends ApiController {
    public function store()
    {
        $user = factory(User::class)->make();

        return tap($user)->save();
    }
}
