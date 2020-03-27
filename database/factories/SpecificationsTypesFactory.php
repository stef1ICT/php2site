<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\SpecificationsType;
use Faker\Generator as Faker;

$factory->define(SpecificationsType::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
