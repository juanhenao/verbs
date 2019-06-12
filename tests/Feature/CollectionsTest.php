<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CollectionsTest extends TestCase
{
    use DatabaseTransactions;


    /** @test */
    public function guest_user_may_not_create_collection()
    {

        $this->post('/collections')->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_a_collection()
    {
        $attributes = ['name' => 'Example collection'];

        //Given I am logged in
        $this->actingAs(factory('App\User')->create());

        //When they hit the endpoint /words while passing the necessary data
        $this->post('/collections', $attributes);

        //Then it should be a new collection in the database
        $this->assertDatabaseHas('collections', $attributes);
    }
}
