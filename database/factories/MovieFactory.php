<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'movie_name' => $faker->name,
        'user_id' => 2,
        'imdb_id' => 2,
        'rating' => 2

    ];
});
