<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Word;
use App\Type;

$factory->define(Word::class, function (Faker $faker) {
    $types = Type::all();
    $index = $faker->numberBetween(0, Type::count() - 1);

    return [
        'id' => $faker->uuid,
        'word' => $faker->word,
        'translation' => $faker->word,
        'type_id' => $types[$index]['id'],
        'example' => $faker->sentence(5)
    ];
});
