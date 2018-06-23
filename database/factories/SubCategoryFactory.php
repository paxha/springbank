<?php

use Faker\Generator as Faker;

$factory->define(App\SubCategory::class, function (Faker $faker) {
    return [
        'name' => 'Sub Category '. $faker->randomElement($array = array ('a','b','c')),
        'main_category_id' => $faker->numberBetween(1, 10)
    ];
});
