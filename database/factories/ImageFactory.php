<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
       'imageUrl' => $faker->imageUrl($width = 640, $height = 480),
       'product_id' => function() {
            return  Product::inRandomOrder()->first()->id;
       }
    ];
});
