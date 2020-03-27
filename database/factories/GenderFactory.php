<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gender;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Gender::class, function (Faker $faker) {
    return [
        'genderName' => Str::random(5)
    ];
});
