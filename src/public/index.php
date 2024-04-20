<?php

use App\classA;
use App\PaymentGateway\Stripe\Transaction;

require __DIR__.'/../vendor/autoload.php';

$obj = new class(1, 2, 3) {
    public function __construct(public int $x, public int $y, public int $z)
    {
    }
};

$objA = new classA(5, 5);

echo '<pre/>';
var_dump(get_class($obj), $obj, $objA->bar());
echo '<pre/>';

echo '<hr/>';
echo Transaction::class;

