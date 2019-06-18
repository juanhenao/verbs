<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['description' => 'verb', 'translation' => 'types.verb'],
            ['description' => 'noun', 'translation' => 'types.noun'],
            ['description' => 'adjective', 'translation' => 'types.adjective'],
            ['description' => 'adverb', 'translation' => 'types.adverb'],
            ['description' => 'pronoun', 'translation' => 'types.pronoun'],
            ['description' => 'preposition', 'translation' => 'types.preposition'],
            ['description' => 'conjunction', 'translation' => 'types.conjunction'],
            ['description' => 'determiner', 'translation' => 'types.determiner'],
            ['description' => 'exclamation', 'translation' => 'types.exclamation']
        ];
        $faker = Faker\Factory::create();
        foreach ($types as $type) {
            Type::create(array_merge(['id' => $faker->uuid], $type));
        }
    }
}
