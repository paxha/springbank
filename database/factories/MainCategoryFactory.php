<?php

use Faker\Generator as Faker;

$factory->define(App\MainCategory::class, function (Faker $faker) {
    return [
        'name' => 'Category '. $faker->numberBetween(1, 10)
    ];
});
