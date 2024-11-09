<?php

use PHPUnit\Framework\TestCase;

class OrderTwoTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function test_order_is_processed_using_mock()
    {

        $order = new OrderTwo(2, 5);
        $this->assertEquals(10.00, $order->amount);

        $gateway_mock = Mockery::mock('PaymentGateway');
        $gateway_mock->shouldReceive('charge')
            ->once()
            ->with(10);
        $order->process($gateway_mock);
    }

    public function test_order_is_processed_using_spy()
    {
        $order = new OrderTwo(2, 5);
        $this->assertEquals(10, $order->amount);

        $gateway_spy = Mockery::spy('PaymentGateway');

        $order->process($gateway_spy);
        $gateway_spy->shouldHaveReceived('charge')
            ->once()
            ->with(10);
    }
}
