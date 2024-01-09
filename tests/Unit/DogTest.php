<?php

// tests/Unit/DogTest.php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Dog;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a dog instance.
     *
     * @return void
     */
    public function testCreateDog()
    {
        $dogData = [
            'name' => 'Buddy',
            'estimated_age' => 5,
            'date_of_birth' => null,
        ];

        $dog = Dog::create($dogData);

        $this->assertDatabaseHas('dogs', $dogData);
        $this->assertInstanceOf(Dog::class, $dog);
        $this->assertEquals('Buddy', $dog->name);
        $this->assertEquals(5, $dog->estimated_age);
        $this->assertNull($dog->date_of_birth);
    }

}
