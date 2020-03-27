<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Specifications;
use App\Product;
use App\SpecificationsType;
use Faker\Generator as Faker;

$factory->define(Specifications::class, function (Faker $faker) {
    return [
        'product_id' => function() {
              return  Product::inRandomOrder()->first()->id;
        },
        'specifications_type_id' => function() {
            return SpecificationsType::inRandomOrder()->first()->id;
        },
        'value' => $faker->word
    ];
});
