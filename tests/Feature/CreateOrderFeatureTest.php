<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateOrderFeatureTest extends TestCase
{
    use RefreshDatabase;
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
            'address' => 'Haha st. 5, El Segundo',
            'card_number' => '4444555588889999',
            'cvv' => '562',
            'expiry_date' => '2025-07'
        ];

        //Act
        $response = $this->json('post','/api/orders', $order);


        //Arrange
        $response->assertStatus(200)->assertJsonStructure([
            'message'
        ]);
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

        //Act & Assert
        $this->json('post', '/api/orders', $order)->assertStatus(422);
    }
}
