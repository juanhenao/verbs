<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(
            function ($user) {
                for ($i = 0; $i <= mt_rand(0, 3); $i++) {
                    $user->collections()->save(factory(App\Collection::class)->make());
                }
            }
        );
    }
}
