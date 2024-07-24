<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\History;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => $faker->userName,
        'item_id' => $faker->name,
        'itemname' => $faker->name,
        'quantity' => $faker->numberBetween(0, 100),
        'image' => $faker->image,
        'total' => $faker->amount,
        'date' => $faker->dateTimeThisCentury,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
