<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Word;
use App\Type;

$factory->define(Word::class, function (Faker $faker) {
    $typeNumber = Type::count();

    return [
        'word' => $faker->word,
        'translation' => $faker->word,
        'type_id' => $faker->numberBetween(1, $typeNumber),
        'example' => $faker->sentence(5)
    ];
});
