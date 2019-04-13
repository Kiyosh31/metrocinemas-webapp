<?php

use Faker\Generator as Faker;

$factory->define(Metrocinemas\Auditorium::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'seats_no' => $faker->numberBetween($min = 10, $max = 30),
    ];
});
