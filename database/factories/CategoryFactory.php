<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Gender;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'categoryName' => Str::random(8)
    ];
});
