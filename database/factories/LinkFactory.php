<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Link::class, function (Faker $faker) {
    return [
        'user_id'          => rand(1, 100),
        'link_category_id' => rand(1, 6),
        'title'            => 'Velox, superbus guttuss inciviliter.',
        'url'              => $faker->url,
    ];
});
