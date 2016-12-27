<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'izzudinanuar',
        'email' => 'azuxies@gmail.com',
        'role' => 2,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Shirt::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(),
        'price' => $faker->randomNumber(2),
        'xxs' => $faker->randomNumber(2),
        'xs' => $faker->randomNumber(2),
        's' => $faker->randomNumber(2),
        'm' => $faker->randomNumber(2),
        'l' => $faker->randomNumber(2),
        'xl' => $faker->randomNumber(2),
        'xxl' => $faker->randomNumber(2),
        'xxxl' => $faker->randomNumber(2),
    ];
});
