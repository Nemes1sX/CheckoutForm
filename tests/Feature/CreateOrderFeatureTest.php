<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateOrderFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_successfull_order_post(): void
    {
        //Arrange
        $order = [
            'first_name' => 'Vardenis',
            'last_name' => 'Pavardenis',
            'country' => 'USA',
            'region' => 'California',
            'address' => 'Haha st. 5, El Segundo'
        ];

        //Act
        $response = $this->post('/api/orders');

        //Assert
        $response->assertStatus(200);
    }

    public function test_failed_order_post(): void
    {
        //Arrange
        $order = [
            'first_name' => 'Vardenis',
            'last_name' => 'Pavardenis',
            'country' => 'USA',
            'region' => 'California',
            'address' => 'Haha st. 5, El Segundo'
        ];

        //Act
        $response = $this->post('/api/orders');

        //Assert
        $response->assertStatus(422);
    }
}
