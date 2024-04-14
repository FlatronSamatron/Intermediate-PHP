<?php

namespace App\PaymentGateway\Stripe;

use App\Enums\Status;

class Transaction
{
    private static int $count = 0;
    public function __construct(public float $amount, public string $description)
    {
        self::$count++;
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public function process()
    {
        echo 'Processing paddle transaction...';
    }

}