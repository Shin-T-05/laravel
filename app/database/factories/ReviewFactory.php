<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => $faker->userName,
        'item_id' => $faker->name,
        'title' => $faker->name,
        'comment' => $faker->sentence,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
