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
        Type::create(['description' => 'verb', 'translation' => 'types.verb']);
        Type::create(['description' => 'noun', 'translation' => 'types.noun']);
        Type::create(['description' => 'adjective', 'translation' => 'types.adjective']);
        Type::create(['description' => 'adverb', 'translation' => 'types.adverb']);
        Type::create(['description' => 'pronoun', 'translation' => 'types.pronoun']);
        Type::create(['description' => 'preposition', 'translation' => 'types.preposition']);
        Type::create(['description' => 'conjunction', 'translation' => 'types.conjunction']);
        Type::create(['description' => 'determiner', 'translation' => 'types.determiner']);
        Type::create(['description' => 'exclamation', 'translation' => 'types.exclamation']);
    }
}
