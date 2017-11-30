<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job::class, function (Faker $faker) {
    return [
        'job_category_id' => rand(1, 6),
        'job_company_id' => rand(1, 10),
        'title' => $faker->jobTitle,
        'description' => $faker->paragraphs(3, true),
        'perks' => $faker->paragraphs(2, true),
        'expectation' => $faker->paragraphs(2, true),
    ];
});
