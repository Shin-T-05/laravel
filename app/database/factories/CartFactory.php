<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => $faker->userName,
        'item_id' => $faker->name,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
