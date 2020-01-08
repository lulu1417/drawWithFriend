<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Path;
use Faker\Generator as Faker;

$factory->define(Path::class, function (Faker $faker) {
    return [
        'user_id'=> rand(1,10),
        'width'=>rand(1,10),
        'red'=> rand(1,10),
        'green'=> rand(1,10),
        'blue'=> rand(1,10),
    ];
});
