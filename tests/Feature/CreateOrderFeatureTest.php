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

        $orderItems = [
            [
                'name' => 'Trainers',
                'price' => 68,
                'quantity' => 2,
                'currency' => 'EUR'
            ],
            [
                'name' => 'Jacket',
                'price' => 76,
                'quantity' => 2,
                'currency' => 'EUR'
            ]
        ];

        $order = [
            'first_name' => 'Vardenis',
            'last_name' => 'Pavardenis',
            'country' => 'USA',
            'region' => 'California',
            'address' => 'Haha st. 5, El Segundo',
            'card_number' => '4444555588889999',
            'cvv' => '562',
            'expiry_date' => '2025-07',
            'cart' => $orderItems
        ];

        //Act
        $response = $this->json('post','/api/orders', $order);


        //Arrange
        $this->assertDatabaseHas('orders', [
            'first_name' => $order['first_name'],
            'last_name' => $order['last_name'],
            'country' => $order['country'],
            'region' => $order['region'],
            'address' => $order['address'],
        ]);
        $this->assertDatabaseHas('order_items', [$orderItems]);
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

        //Act
        $response = $this->json('post', '/api/orders', $order);

        //Arrange
        $response->assertStatus(422);
    }
}
