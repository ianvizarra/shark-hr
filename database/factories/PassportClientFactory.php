<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Laravel\Passport\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'user_id' => null,
        'name' => $faker->company,
        'secret' => Str::random(40),
        'redirect' => $faker->url,
        'personal_access_client' => false,
        'password_client' => false,
        'revoked' => false,
    ];
});

$factory->state(Client::class, 'password_client', function (Faker $faker) {
    return [
        'personal_access_client' => false,
        'password_client' => true,
    ];
});
