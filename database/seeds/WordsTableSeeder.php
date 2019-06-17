<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Collection::all()->each(function ($collection) {
            for ($i = 0; $i <= rand(0, 50); $i++) {
                $collection->words()->save(factory(App\Word::class)->make());
            }
        });
    }
}
