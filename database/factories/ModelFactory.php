<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(\App\Models\User::class, 'unconfirmed', function () {
    return [
        'confirmed' => false
    ];
});

$factory->state(\App\Models\User::class, 'administrator', function () {
    return [
        'name' => 'JohnDoe'
    ];
});

$factory->define(\App\Models\Thread::class, function ($faker) {
    $title = $faker->sentence;
    return [
        'user_id' => function () {
            return factory('\App\Models\User')->create()->id;
        },
        'channel_id' => function () {
            return factory('\App\Models\Channel')->create()->id;
        },
        'title' => $title,
        'body'  => $faker->paragraph,
        'visits' => 0,
        'slug' => str_slug($title),
        'locked' => false
    ];
});

$factory->define(\App\Models\Channel::class, function ($faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => $name
    ];
});

$factory->define(\App\Models\Reply::class, function ($faker) {
    return [
        'thread_id' => function () {
            return factory('\App\Models\Thread')->create()->id;
        },
        'user_id' => function () {
            return factory('\App\Models\User')->create()->id;
        },
        'body'  => $faker->paragraph
    ];
});

$factory->define(\Illuminate\Notifications\DatabaseNotification::class, function ($faker) {
    return [
        'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        'type' => '\App\Models\Notifications\ThreadWasUpdated',
        'notifiable_id' => function () {
            return auth()->id() ?: factory('\App\Models\User')->create()->id;
        },
        'notifiable_type' => '\App\Models\User',
        'data' => ['foo' => 'bar']
    ];
});