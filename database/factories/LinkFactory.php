<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'user_id' => 1
    ];
});
