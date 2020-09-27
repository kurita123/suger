<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Recipe;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
    ];
});

$factory->define(App\Models\Recipe::class, function (Faker $faker) {
    return [
        'user_id' => 5,
        'c_name' => $faker->name,
        'material' => $faker->sentence(),
        't_suger' => $faker->numberBetween(1,30),
        'amount' => $faker->numberBetween(30,100),
        'recipe' => $faker->sentence(),
        'imgpath' => $faker->image,
        'evaluation' => random_int(1,5),
        'imgpath'  => 'yudetamago.jpg'
    ];
});

