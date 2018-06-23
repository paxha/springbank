<?php

use Faker\Generator as Faker;

$factory->define(App\FileInfo::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'file_link' => 'http://localhost/springbank/storage/app/file/dummy.pdf',
        'sub_category_id' => $faker->numberBetween(1, 50)
    ];
});
