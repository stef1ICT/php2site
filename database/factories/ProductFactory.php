<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use App\Gender;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $number = rand(10,55);
    return [
    'name' => Str::random(10),
        'price' => $number,
        'category_id' => function() {
        return Category::inRandomOrder()->first()->id;
        },
        'gender_id' => function() {
            return Gender::inRandomOrder()->first()->id;
            },
        'description' => $faker->paragraph($faker->numberBetween(5,15),true)
    ];
});
