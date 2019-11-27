<?php

use Illuminate\Database\Seeder;
use Domain\User\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create();
        factory(User::class, 10)->state('dog_owner')->create();
    }
}
