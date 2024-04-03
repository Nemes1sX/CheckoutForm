<?php

namespace Tests\Unit;

use App\Services\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderUnitTest extends TestCase
{
    use RefreshDatabase;
    protected OrderService $orderService;

    public function setUp(): void
    {
        parent::setUp();
        $this->orderService = new OrderService();
    }

    /**
     * A basic unit test example.
     */
    public function test_create_order(): void
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
         $this->orderService->create($order['first_name'], $order['last_name'], $order['country'],
            $order['region'], $order['address']);

        $this->assertDatabaseHas('orders', $order);
    }
}
