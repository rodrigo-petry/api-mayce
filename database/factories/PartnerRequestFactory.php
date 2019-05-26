<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\PartnerRequest::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone_number' => "99999999999",
        'password' => $faker->password,
        'city' => $faker->city
    ];
});
