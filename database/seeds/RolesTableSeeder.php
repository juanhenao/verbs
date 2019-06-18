<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => '42067040-a2db-387f-a1bd-8b9399751260',
            'name' => 'admin'
        ]);
        Role::create([
            'id' => '3d879527-ea79-37dc-bf2b-f750870426fb',
            'name' => 'user'
        ]);
    }
}
