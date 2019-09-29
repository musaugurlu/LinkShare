<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Share;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Share::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'url' => Str::random(10),
        'started_at' => now(),
        'expired_at' => now()->addDays(7),
        'user_id' => 1
    ];
});
