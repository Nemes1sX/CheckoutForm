<?php

namespace Tests\Unit;

use App\Services\OrderService;
use App\Services\OrderItemService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderItemUnitTest extends TestCase
{
    use RefreshDatabase;
    protected OrderService $orderService;
    protected OrderItemService $orderItemService;
    public function setUp(): void
    {
        parent::setUp();
        $this->orderItemService = new OrderItemService();
        $this->orderService = new OrderService();
    }

    /**
     * A basic unit test example.
     */
    public function test_create_order_items(): void
    {
        //Act
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

        $orderData = [
            'first_name' => 'Vardenis',
            'last_name' => 'Pavardenis',
            'country' => 'USA',
            'region' => 'California',
            'address' => 'Haha st. 5, El Segundo'
        ];

        //Act
        $order = $this->orderService->create($orderData['first_name'], $orderData['last_name'], $orderData['country'],
            $orderData['region'], $orderData['address']);
        $this->orderItemService->create($order, $orderItems);


        $this->assertDatabaseHas('order_items', [$orderItems]);
    }
}
