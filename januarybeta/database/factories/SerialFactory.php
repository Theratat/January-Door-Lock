<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Serial;
use Faker\Generator as Faker;

$factory->define(Serial::class, function (Faker $faker) {
    return [
        'SERIAL' => strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16)),
    ];
});
