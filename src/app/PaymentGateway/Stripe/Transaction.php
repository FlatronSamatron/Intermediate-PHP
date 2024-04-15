<?php

namespace App\PaymentGateway\Stripe;

class Transaction
{
    private float $amount;
    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function process()
    {
        echo 'Processing $' . $this->amount . ' transaction';
    }

}