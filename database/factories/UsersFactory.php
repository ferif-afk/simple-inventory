<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $listRole = [
            'admin',
            'staff'
        ];

    return [
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('admin'), // password
        'role' => $faker->unique()->randomElement($listRole)
    ];
});
