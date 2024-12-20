<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{

    public function teardown(): void
    {
        Mockery::close();
    }

    // public function test_order_is_processed()
    // {


    //     $gateway = $this->getMockBuilder('PaymentGateway')
    //         ->onlyMethods(['charge'])
    //         ->getMock();


    //     $gateway->expects($this->once())
    //         ->method('charge')
    //         ->with($this->equalTo(200))
    //         ->willReturn(true);
    //     $order = new Order($gateway);

    //     $order->amount = 200;

    //     $this->assertTrue($order->process());
    // }

    public function test_order_is_processed_using_mockery()
    {
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);
        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
