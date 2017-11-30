<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Thread::class, function (Faker $faker) {
    $title = $faker->sentence(5, false);

    return [
        'slug' => str_slug($title, '_'),
        'user_id' => rand(1, 100),
        'channel_id' => rand(1, 12),
        'title' => $title,
        'body' => $faker->paragraphs(4, true)
    ];
});
