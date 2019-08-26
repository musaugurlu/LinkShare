<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\LinkGroup;
use Faker\Generator as Faker;

$factory->define(LinkGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => 1,
        'share_id' => 1
    ];
});
