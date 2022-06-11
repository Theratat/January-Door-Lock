<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'PIN' => strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8)),
        'username' => $faker->username,
        'password' => $faker->password,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email' => $faker->safeEmail,
        'owner_status' => false
    ];
});
