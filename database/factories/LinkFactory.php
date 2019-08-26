<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'url' => Str::random(10),
        'user_id' => 1,
        'link_group_id' => 1
    ];
});
