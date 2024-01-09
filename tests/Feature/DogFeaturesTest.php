<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DogFeaturesTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Execute request to get register dog for.
     */
    public function createDogRouteOK(): void
    {
        $response = $this->get('/dogs/create');

        $response->assertStatus(200);
    }

    /**
     * Execute random request
     */
    public function fallbackRouteTest(): void
    {
        $response = $this->get('/any-route');
        $response->assertStatus(302);
    }

    /**
     * Test dog creation with date of birth null and estimated age provided.
     *
     * @return void
     */
    public function testDogCreationWithNullDateOfBirth()
    {
        $dogData = [
            'name' => 'Bernard',
            'estimated_age' => 5,
            'date_of_birth' => null,
            'unknown_date_of_birth' => true
        ];

        $response = $this->post('/dogs/store', $dogData);

        array_pop($dogData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('dogs', $dogData);
    }

    /**
     * Test dog creation with estimated age null and date of birth provided.
     *
     * @return void
     */
    public function testDogCreationWithNullEstimatedAge()
    {
        $dogData = [
            'name' => 'Paquito',
            'estimated_age' => null,
            'date_of_birth' => '2010-06-01',
            'unknown_date_of_birth' => false
        ];

        $response = $this->post('/dogs/store', $dogData);
        $dogCreated = [
            'name' => 'Paquito',
            'estimated_age' => null,
            'date_of_birth' => '2010-06-01 00:00:00'
        ];
        $response->assertStatus(200);
        $this->assertDatabaseHas('dogs', $dogCreated);
    }

    /**
     * Test dog creation fails when both date of birth and estimated age are null.
     *
     * @return void
     */
    public function testDogCreationFailsWhenBothDateOfBirthAndEstimatedAgeAreNull()
    {
        $dogData = [
            'name' => 'Alberto',
            'estimated_age' => '',
            'date_of_birth' => '',
            'unknown_date_of_birth' => false
        ];

        $response = $this->post('/dogs/store', $dogData);

        $response->assertStatus(302);
    }
}
