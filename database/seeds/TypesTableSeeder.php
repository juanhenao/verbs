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
        Type::create(['description' => 'verb']);
        Type::create(['description' => 'noun']);
        Type::create(['description' => 'adjective']);
        Type::create(['description' => 'adverb']);
        Type::create(['description' => 'pronoun']);
        Type::create(['description' => 'preposition']);
        Type::create(['description' => 'conjunction']);
        Type::create(['description' => 'determiner']);
        Type::create(['description' => 'exclamation']);
    }
}
