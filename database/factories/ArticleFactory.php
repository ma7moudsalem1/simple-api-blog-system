<?php

use Faker\Generator as Faker;



$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'slug'	=> str_slug($faker->title),
        'content' => $faker->text,
        'user_id' => App\User::all()->random()->id, // secret
        'status' => rand(0,1),
    ];
});
