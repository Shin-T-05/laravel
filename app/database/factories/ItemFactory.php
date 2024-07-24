<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => $faker->userName,
        'itemname' => $faker->name,
        'image' => $faker->image,
        'sentence' => $faker->sentence,
        'amount' => $faker->amount,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
