<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Domain\User\User;
use Domain\Dog\Dog;
use Faker\Generator as Faker;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

/**
 * Seed between 1 and 10 dogs for the user if we want a dog owner
 */
$factory->afterCreatingState(User::class, 'dog_owner', function (User $user, Faker $faker) {
    collect(range(0, $faker->numberBetween(1, 10)))->each(function() use ($user) {
        $user->dogs()->save(factory(Dog::class)->create());
    });
});
