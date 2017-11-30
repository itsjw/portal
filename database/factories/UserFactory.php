<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'name'               => $name,
        'username'           => str_slug($name, '_'),
        'email'              => $faker->email,
        'company'            => $faker->company,
        'website'            => $faker->url,
        'github_url'         => 'https://github.com/'.str_slug($name, '_'),
        'twitter_url'        => 'https://twitter.com/'.str_slug($name, '_'),
        'intro'              => $faker->paragraphs(2, true),
        'avatar_path'        => $faker->imageUrl('300', '300'),
        'password'           => bcrypt(str_random(12)),
        'lat'                => $faker->latitude,
        'lng'                => $faker->longitude,
        'address'            => $faker->streetAddress,
        'city'               => $faker->city,
        'country'            => $faker->country,
        'affiliate_id'       => str_random(10),
        'is_verified'        => false,
        'confirmation_token' => str_random(64),
    ];
});
