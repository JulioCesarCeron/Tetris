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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});


$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence(10),
        'value' => $faker->randomFloat(2,10,3000)
    ];
});

$factory->define(App\Turma::class, function (Faker\Generator $faker) {

    $serie = $faker->numberBetween(2,1,13);
    $letter = chr(64+rand(1,6));;
    $turma = $serie . $letter;

    return [
        'serie' => $serie,
        'turma' => $turma,
    ];
});