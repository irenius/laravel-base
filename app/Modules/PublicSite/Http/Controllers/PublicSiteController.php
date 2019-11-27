<?php

namespace PublicSite\Http\Controllers;

use Domain\Dog\DogRepository;
use Domain\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Infrastructure\Http\ApiController;

class PublicSiteController extends ApiController {
    /**
     * @var \Domain\Dog\DogRepository
     */
    private $dogs;
    /**
     * @var \Domain\User\UserRepository
     */
    private $users;

    /**
     * PublicController constructor.
     *
     * @param \Domain\User\UserRepository $users
     * @param \Domain\Dog\DogRepository   $dogs
     */
    public function __construct(UserRepository $users, DogRepository $dogs)
    {
        $this->dogs = $dogs;
        $this->users = $users;
    }

    public function index(Request $request)
    {
        $user = $this->users->inRandomOrder()->first();

        if (!$user) return $this->error(['Missing seeded users']);

        $this->dogs->byOwner($user);

        if ($name = $request->get('name')) {
            $this->dogs->searchName($name);
        }

        return $this->success($this->dogs->get());
    }
}
