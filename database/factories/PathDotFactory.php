<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PathDot;
use Faker\Generator as Faker;

$factory->define(PathDot::class, function (Faker $faker) {
    return [
        'path_id'=>rand(1,20),
        'dot_id'=> $faker->unique()->numberBetween(1, 80),
    ];
});
