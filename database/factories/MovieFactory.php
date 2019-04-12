<?php

use Faker\Generator as Faker;

$factory->define(Metrocinemas\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentence(10),
        'director' => $faker->name,
        'cast' => $faker->name,
        'clasification' => $faker->randomElement([
            'A',
            'AA',
            'B',
            'B15',
            'C'
        ]),
        'category' => $faker->randomElement([
            'Comedia',
            'Sci-Fi',
            'Horror',
            'Romance',
            'Accion',
            'Thriller',
            'Drama',
            'Misterio',
            'Animacion',
            'Aventura',
            'Fantasia',
            'Comedia Romantica',
            'Accion Comedia',
            'Super Heores'
        ]),
        'duration_min' => $faker->randomDigit,
    ];
});
