<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CollectionsTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_collection()
    {
        $attributes = ['name' => 'Example collection'];

        //Given I am logged in
        $this->actingAs(factory('App\User')->create());

        //When they hit the endpoint /words while passing the necessary data
        $this->post('/collection', $attributes);

        //Then it should be a new collection in the database
        $this->assertDatabaseHas('collections', $attributes);

        /*$response = $this->get('/');

        $response->assertStatus(200);*/
    }
}
