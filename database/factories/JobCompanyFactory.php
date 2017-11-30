<?php

use Faker\Generator as Faker;

$factory->define(App\Models\JobCompany::class, function (Faker $faker) {
    return [
        'logo_path' => $faker->imageUrl(300, 300),
        'name' => $faker->domainName,
        'description' => $faker->paragraphs(3, true),
        'url' => $faker->url,
        'phone' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'country' => $faker->country,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude
    ];
});
