<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\posts;
use App\country;
use App\comment;
use App\video;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'country_id' => function()
        {
            return factory('App\country')->create()->id;
        }
    ];
});

$factory->define(posts::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->name,
        'user_id' => function()
        {
            return factory('App\User')->create()->id;
        }
    ];
});

$factory->define(country::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(video::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'url' => $faker->name,
    ];
});



$factory->define(comment::class, function (Faker $faker) {
    return [
        'commentable_type' => 'App\posts',
        'commentable_id' => 1,
    ];
});
