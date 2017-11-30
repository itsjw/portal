<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meetup::class, function (Faker $faker) {
    $url_name = $faker->url;

    return [
        'name' => $faker->domainName,
        'link' => $url_name,
        'url_name' => $url_name,
        'description' => $faker->paragraphs(3, true),
        'localized_country_name' => $faker->country,
        'state' => $faker->countryCode,
        'lat' => $faker->latitude,
        'lon' => $faker->longitude,
        'member_count' => \App\Models\User::count(),
        'who' => rand(1, 100),
        'timezone' => $faker->timezone
    ];
});
