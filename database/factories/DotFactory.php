<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dot;
use Faker\Generator as Faker;

$factory->define(Dot::class, function (Faker $faker) {
    return [
        'x_axis'=>rand(1,10),
        'y_axis'=> rand(1,10),
    ];
});
