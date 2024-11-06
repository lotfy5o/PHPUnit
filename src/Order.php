<?php

class Order
{
    /**
     * @var int
     */
    public $amount = 0;

    /**
     * @var PaymentGateway
     */

    public $gateway;


    /**
     * Constructor
     * @return void
     */
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return boolean 
     */
    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}
