<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    //str::random() - laravel helper
    //more about laravel helper - https://laravel.com/docs/10.x/helpers
    return [
        'name' => 'Product-' . Str::random(5),
        'price' => 100,
        'quantity' => 0
    ];
});
