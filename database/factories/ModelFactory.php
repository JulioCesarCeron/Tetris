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
        'name'        => $faker->word,
        'description' => $faker->sentence(10),
        'value'       => $faker->randomFloat(2,10,3000)
    ];
});

$factory->define(App\Turma::class, function (Faker\Generator $faker) {

    $serie  = $faker->numberBetween(2,1,13);
    $letter = chr(64+rand(1,6));;
    $turma  = $serie . $letter;

    return [
        'serie' => $serie,
        'turma' => $turma,
    ];
});


$factory->define(App\ItemReserva::class, function (Faker\Generator $faker) {

    return [
        'nome_item'  => $faker->word,
        'quantidade' => rand(1, 100),
        'descricao'  => $faker->sentence(50),
    ];
});

$factory->define(App\Materia::class, function (Faker\Generator $faker) {
    $nomeMateria = array("Matemática", "Geográfia", "História", "Filosofia", "Portugues", "Física", "Biologia"); 
    return [
        'materia'  => $nomeMateria[rand(0, 6)],
        'professor_user_id' => rand(2, 8),
    ];
});

$factory->define(App\Horario::class, function (Faker\Generator $faker) {
    return [
        'turma_id' => rand(1, 10),
        'seg_per_1' => rand(1, 7),
        'seg_per_2' => rand(1, 7),
        'seg_per_3' => rand(1, 7),
        'seg_per_4' => rand(1, 7),
        'ter_per_1' => rand(1, 7),
        'ter_per_2' => rand(1, 7),
        'ter_per_3' => rand(1, 7),
        'ter_per_4' => rand(1, 7),
        'quar_per_1' => rand(1, 7),
        'quar_per_2' => rand(1, 7),
        'quar_per_3' => rand(1, 7),
        'quar_per_4' => rand(1, 7),
        'quin_per_1' => rand(1, 7),
        'quin_per_2' => rand(1, 7),
        'quin_per_3' => rand(1, 7),
        'quin_per_4' => rand(1, 7),
        'sex_per_1' => rand(1, 7),
        'sex_per_2' => rand(1, 7),
        'sex_per_3' => rand(1, 7),
        'sex_per_4' => rand(1, 7),
    ];
});