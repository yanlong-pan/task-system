<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('dcode_trial'), // password
        // 'remember_token' => Str::random(10),
    ];
});

$factory->defineAs(User::class, 'admin', function (Faker $faker) {
    return [];
});

$factory->state(User::class, 'inspector', [
    'name' => 'dcode',
    'email' => 'employment@dode.com.au',
    'password' => bcrypt('dcode_trial')
]);

$factory->afterCreating(App\User::class, function ($user, $faker) {
    $user->tasks()->saveMany(factory(App\Task::class, 6)->make());
});
